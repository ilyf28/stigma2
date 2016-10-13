@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Dashboard</a></li>
</ul>

<div class="row">
    <div class="columns small-12">
        <div class="panel white-panel  radius">
            <h5>HEALTH CHECK <a class="right" id="refresh-btn"><i class="fi-refresh"></i>&nbsp;refresh</a></h5> 
            <div class="row health-check-area">
                <div class="small-3 columns"> 
                    <div class="health-box" id="nagios-box">

                        <div class="round">
                            <i class="fi-check"></i>
                            <i class="fi-x"></i>
                        </div>
                        <div class="title">
                            NAGIOS
                        </div>
                    </div>
                </div>

                <div class="small-3 columns">
                    <div class="health-box" id="influxdb-box">

                        <div class="round">
                            <i class="fi-check"></i>
                            <i class="fi-x"></i>
                        </div>
                        <div class="title">
                            INFLUXDB
                        </div>
                    </div> 
                </div>

                <div class="small-3 columns">
                    <div class="health-box" id="grafana-box">

                        <div class="round">
                            <i class="fi-check"></i>
                            <i class="fi-x"></i>
                        </div>

                        <div class="title">
                            GRAFANA
                        </div>
                    </div>
                </div>

                <div class="small-3 columns">
                    <div class="health-box" id="database-box">

                        <div class="round">
                            <i class="fi-check"></i>
                            <i class="fi-x"></i>
                        </div>

                        <div class="title">
                            MYSQL
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

@section('scripts')
<script>
jQuery(function($){
    var refresh = function(){
        $.getJSON('/admin/dashboard/refresh',function(response){
                var nagios = response.nagios;
                var influxdb = response.influxdb;
                var database = response.database;
                var grafana = response.grafana;

                if(!nagios){
                    $('#nagios-box').addClass('error');
                    $('#nagios-box').removeClass('success');
                }else{
                    $('#nagios-box').addClass('success');
                    $('#nagios-box').removeClass('error');
                }

                if(!influxdb){
                    $('#influxdb-box').addClass('error');
                    $('#influxdb-box').removeClass('success');
                }else{
                    $('#influxdb-box').addClass('success');
                    $('#influxdb-box').removeClass('error');
                } 

                if(!grafana){
                    $('#grafana-box').addClass('error');
                    $('#grafana-box').removeClass('success');
                }else{
                    $('#grafana-box').addClass('success');
                    $('#grafana-box').removeClass('error');
                } 

                if(!database){
                    $('#database-box').addClass('error');
                    $('#database-box').removeClass('success');
                }else{
                    $('#database-box').addClass('success');
                    $('#database-box').removeClass('error');
                } 

            });
        };

    $('#refresh-btn').click(function(){
        refresh();
    });

    refresh();

    setInterval(function(){ refresh(); }, 60000);
});
</script>
@stop
