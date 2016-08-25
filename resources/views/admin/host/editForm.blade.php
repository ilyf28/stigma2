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

        @foreach($hostTmpl as $key => $formGroup) 
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
                        @if(isset($hostJsonData) && isset(json_decode($hostJsonData)->{$key})) 
                        <?php 
                        $data = json_decode($hostJsonData)->{$key};
                        ?>
                        @else
                        <?php
                        $data = null;
                        ?>
                        @endif
                        @if($formGroup['data_type'] == 'enum_command')
                        {!! Form::select($key, array_merge(['0' => 'none' ], $commandList), $data)  !!}
                        @elseif($formGroup['data_type'] == 'enum_contact')
                        {!! Form::select($key, array_merge(['0' => 'none' ], $contactList), $data)  !!}
                        @elseif($formGroup['data_type'] == 'enum_timeperiod')
                        {!! Form::select($key, $timeperiodList, $data)  !!}
                        @elseif(isset($host) && $host->is_template && $formGroup['display_name'] == 'host_name')
                        {!! Form::text($key, $host->template_name ) !!}
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
            <h5>Used Host Template</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Host Template</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($hostTemplateCollection as $hostTemplate)
                @if(isset($host) == null || (isset($host) && $host->getKey() != $hostTemplate->getKey()) )
                <tr>
                    <?php
                    $check = false;
                    $uses = [];

                    if(isset($host)) {
                    $data = $host->data;
                    $used = json_decode($data);

                    if (isset(json_decode($used)->use))
                    {
                    $uses = explode(',', json_decode($used)->use);

                    foreach($uses as $use)
                    {
                    if($hostTemplate->host_name == $use){
                    $check = true;
                    }
                    }
                    }
                    }
                    ?>
                    <td>{!! Form::checkbox('host_template[]', $hostTemplate->getKey(), $check) !!}</td>
                    <td>
                        <a href="{{ route('admin.hosts.edit',array($hostTemplate->getKey())) }}">{{$hostTemplate->host_name}}</a>
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

