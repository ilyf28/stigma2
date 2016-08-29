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
                        @if(isset($service))
                            {!! Form::select('is_template', array( 'N' => 'N','Y' =>'Y'),$service->is_template)  !!}
                        @else
                            {!! Form::select('is_template', array( 'N' => 'N','Y' =>'Y'))  !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @foreach($serviceTmpl as $key => $formGroup) 
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
                        @if(isset($serviceJsonData) && isset($serviceJsonData->{$key})) 
                            <?php 
                                $data = $serviceJsonData->{$key};
                            ?>
                        @else
                            <?php 
                                $data = null;
                            ?>
                        @endif
                        @if($formGroup['data_type'] == 'enum_command')
                            {!! Form::select($key, array_merge(['0' => 'none' ], $commandList), $command)  !!}
                            {!! Form::text($key, $commandArg) !!}
                        @elseif($formGroup['data_type'] == 'enum_contact')
                            {!! Form::select($key, array_merge(['0' => 'none' ], $contactList), $data)  !!}
                        @elseif($formGroup['data_type'] == 'enum_host')
                            {!! Form::select($key, $hostList, $data)  !!}
                        @elseif($formGroup['data_type'] == 'enum_timeperiod')
                            {!! Form::select($key, $timeperiodList, $data)  !!}
                        @elseif(isset($service) && $service->is_template == 'Y' && $formGroup['display_name'] == 'host_name')
                            {!! Form::text($key, $service->template_name ) !!}
                        @else
                            {!! Form::text($key, $data) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="small-5 columns">
        <div class="panel white-panel  radius">
            <h5>Used Service Template</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Service Template</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($serviceTemplateCollection as $serviceTemplate)
                    @if(isset($service) == null || (isset($service) && $service->getKey() != $serviceTemplate->getKey()) )
                    <tr>
                        <?php
                            $check = false;
                            $uses = [];

                            if (isset($service)) {
                                $data = $service->data;

                                if (isset(json_decode($data)->use)) {
                                    $uses = explode(',', json_decode($data)->use);

                                    foreach ($uses as $use) {
                                        if ($serviceTemplate->host_name == $use) {
                                            $check = true;
                                        }
                                    }
                                }
                            } 
                        ?>
                        <td>{!! Form::checkbox('service_template[]', $serviceTemplate->getKey(), $check) !!}</td>
                        <td>
                            <a href="{{ route('admin.services.edit',array($serviceTemplate->getKey())) }}">{{$serviceTemplate->host_name}}</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>

            </table>
        </div> 
    </div>
</div>
{!! Form::submit('SAVE' ,array('class'=>'right button')) !!}
