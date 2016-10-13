<div class="row">
    <div class="small-7 columns">
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            For Template
                        </label>
                    </div>
                    <div class="small-8 columns">
                        @if(isset($host))
                            {!! Form::select('is_template', array('N' => 'N', 'Y' =>'Y'), $host->is_template)  !!}
                        @else
                            {!! Form::select('is_template', array('N' => 'N', 'Y' =>'Y'))  !!}
                        @endif 
                    </div>
                </div>
            </div>
        </div>

        @foreach($contactTmpl as $key => $formGroup) 
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            @if($formGroup['required'])<span style="color:red">*</span>@endif
                            {{$formGroup['display_name']}}
                        </label>
                    </div>
                    <div class="small-8 columns">
                        @if(isset($contactJsonData) && isset($contactJsonData->{$key})) 
                            <?php 
                                $data = $contactJsonData->{$key};
                            ?>
                        @else
                            <?php
                                $data = null;
                            ?>
                        @endif
                        @if($formGroup['data_type'] == 'enum_host_command')
                            {!! Form::select($key, array_merge(['none' => 'none' ], $commandList), $hostCommand)  !!}
                            {!! Form::text($key.'Arg', $hostCommandArg) !!}
                        @elseif($formGroup['data_type'] == 'enum_service_command')
                            {!! Form::select($key, array_merge(['none' => 'none' ], $commandList), $serviceCommand)  !!}
                            {!! Form::text($key.'Arg', $serviceCommandArg) !!}
                        @elseif($formGroup['data_type'] == 'enum_timeperiod')
                            {!! Form::select($key, $timeperiodList, $data)  !!}
                        @elseif(isset($contact) && $contact->is_template == 'Y' && $formGroup['display_name'] == 'contact_name')
                            {!! Form::text($key, $contact->template_name ) !!}
                        @else
                            {!! Form::text($key, $data ) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="small-5 columns">
        <div class="panel white-panel  radius">
            <h5>Used Contact Template</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Contact Template</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($contactTemplateCollection as $contactTemplate)
                    @if(isset($contact) == null || (isset($contact) && $contact->getKey() != $contactTemplate->getKey()) )
                    <tr>
                        <?php
                            $check = false;
                            $uses = [];

                            if (isset($contact)) {
                                $data = $contact->data;

                                if (isset(json_decode($data)->use)) {
                                    $uses = explode(',', json_decode($data)->use);

                                    foreach ($uses as $use) {
                                        if ($contactTemplate->contact_name == $use) {
                                            $check = true;
                                        }
                                    }
                                }
                            }
                        ?>
                        <td>{!! Form::checkbox('contact_template[]', $contactTemplate->contact_name, $check) !!}</td>
                        <td>
                            <a href="{{ route('admin.contacts.edit',array($contactTemplate->getKey())) }}">{{$contactTemplate->contact_name}}</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{!! Form::submit('CREATE', array('class'=>'right button')) !!}
