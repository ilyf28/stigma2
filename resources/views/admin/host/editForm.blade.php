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
                        {!! Form::select('is_template', array( 'N' => 'N','Y' =>'Y'),$host->is_template)  !!}
                        @else
                        {!! Form::select('is_template', array( 'N' => 'N','Y' =>'Y'))  !!}
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
                            @if($formGroup['required'])<span>*</span>@endif
                            {{$formGroup['display_name']}}
                        </label>
                    </div>
                    <div class="small-8 columns">
                        @if(isset($hostJsonData) && isset($hostJsonData->{$key})) 
                        <?php 
                        $data = $hostJsonData->{$key};
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
                        @else
                        {!! Form::text($key,$data ) !!}
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
                @foreach($hostTemplateCollection as $hostItem)
                @if(isset($host) == null || (isset($host) && $host->getKey() != $hostItem->getKey()) )
                <tr>
                    <?php
                    $check = false ;
                    $templateIds = [] ;

                    if(isset($host)) {
                    $templateIds = $host->template_ids ; 
                    $templateIds = explode(',',$templateIds) ;

                    foreach($templateIds as $templateId)
                    {
                    if($hostItem->getKey() == $templateId){
                    $check = true ;
                    }
                    }
                    } 
                    ?>
                    <td>{!! Form::checkbox('host_template[]', $hostItem->getKey() ,$check) !!}</td>
                    <td>
                        <a href="{{ route('admin.hosts.edit',array($hostItem->getKey())) }}">{{$hostItem->host_name}}</a>
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

