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
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            <span style="color:red">*</span>
                            timeperiod_name
                        </label>
                    </div>
                    <div class="small-8 columns"> 
                        @if(isset($timeperiod))
                            {!! Form::text('timeperiod_name', $timeperiod->timeperiod_name ) !!}
                        @else
                            {!! Form::text('timeperiod_name', '' ) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            <span style="color:red">*</span>
                            alias
                        </label>
                    </div>
                    <div class="small-8 columns"> 
                        @if(isset($timeperiod))
                            {!! Form::text('alias', $timeperiod->alias ) !!}
                        @else
                            {!! Form::text('alias', '' ) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @for ($i = 0; $i < $count; $i++)
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <?php $i_key = $i.'_key'; ?>
                        @if(isset($timeperiodJsonData) && isset($timeperiodJsonData[$i_key])) 
                            <?php 
                                $key = $timeperiodJsonData[$i_key];
                            ?>
                        @else
                            <?php 
                                $key = null;
                            ?>
                        @endif
                        {!! Form::text($i_key, $key, array('style'=>'text-align:right') ) !!}
                    </div>
                    <div class="small-8 columns">
                        <?php $i_value = $i.'_value'; ?> 
                        @if(isset($timeperiodJsonData) && isset($timeperiodJsonData[$i_value])) 
                            <?php 
                                $value = $timeperiodJsonData[$i_value];
                            ?>
                        @else
                            <?php 
                                $value = null;
                            ?>
                        @endif
                        {!! Form::text($i_value, $value ) !!}
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
    <div class="small-5 columns">
        <div class="panel white-panel  radius">
            <h5>Used Time Period Template</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Time Period Template</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div> 
    </div>
</div>
{!! Form::submit('SAVE', array('class'=>'right button')) !!}
