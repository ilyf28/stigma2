<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<title>Stigma2::management</title>

<link rel="stylesheet" href="/css/app.css" />

</head>
<body class="admin-theme"> 
<div class="off-canvas-wrap" data-offcanvas>
    <div class="inner-wrap">
        <!-- start of sidebar-wrapper -->
        <div class="sidebar-wrapper">
            <a class="brand">STIGMA</a>
            <div class="sidebar">
                <ul>
                    <li class="parent" style="border-left:5px solid #3F51B5;"><a href="{{route('admin.dashboard.index')}}"><i class="fi-graph-trend"></i>&nbsp;DASHBOARD</a></li>
                    <li class="parent" style="border-left:5px solid #304FFE;">
                    <a><i class="fi-monitor"></i>&nbsp;HOST MANAGER</a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.hosts.index')}}">List</a></li>
                        <li><a href="{{route('admin.hosts.create')}}"><span class="fi-plus"></span>&nbsp;New Host</a></li>
                    </ul>
                    </li>
                    <li class="parent" style="border-left:5px solid #6200EA;">
                    <a><i class="fi-cloud"></i>&nbsp;SERVICE MANAGER</a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.services.index')}}">List</a></li>
                        <li><a href="{{route('admin.services.create')}}"><span class="fi-plus"></span>&nbsp;New Service</a></li>
                    </ul> 
                    </li>
                    <li class="parent" style="border-left:5px solid #00BCD4;"><a><i class="fi-book"></i>&nbsp;COMMAND MANAGER</a> 
                    <ul class="submenu">
                        <li><a href="{{route('admin.commands.index')}}">List</a></li>
                    </ul>
                    </li>
                    <li class="parent" style="border-left:5px solid #C51162;">
                    <a><i class="fi-cloud"></i>&nbsp;Configuration</a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.configuration.system')}}">System</a></li>
                        <li><a href="{{route('admin.configuration.account')}}">Account</a></li>
                        <li><a href="{{route('admin.configuration.provisioning')}}">Provisioning</a></li>
                        <li><a href="{{ url('/auth/logout') }}"><i class="fi-unlock"></i>&nbsp;Logout</a></li>
                    </ul> 
                    </li>

                </ul>
                <div style="text-align:center;">
                    <a href="/" style="color:#0078a0">Go to Monitoring</a>
                </div>
            </div>
        </div>
        <!-- end of sidebar-wrapper -->
        <div class="content-wrapper">
            <div class="top-bar">
                <section class="top-bar-section">
                    <!-- Right Nav Section -->
                    <ul class="right">
                        <li class="active"><a href="#" data-reveal-id="system-modal"><i class="fi-power"></i>&nbsp;Nagios Restart</a></li> 
                    </ul>

                </section>
            </div>
            <div class="content">
                @yield('contents')
            </div>
        </div>
    </div>
</div>


<div id="system-modal" class="reveal-modal small modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <div class="modal-header">
        <h5 class="title">Serivce Restart</h5>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <div class="modal-body"> 
        <div data-alert class="alert-box radius notification-box" id="notification-box"> 
            
        </div>

        <ul class="step-by-step clearfix">
            <li>1.Generating Host Configuration <span calss="right"><a class="" id="generate-host-file" >Generate Config</a> </span></li>
            <li>2.Generating Service Configuration<span calss="right"><a class="" id="generate-service-file">Generate Config</a> </span></li>
            <li>3.Generating Command Configuration<span calss="right"><a class="" id="generate-command-file">Generate Config</a> </span></li>
        </ul>
    </div> 
    <div class="modal-footer"> 
        <a class="button right small alert restart-btn">NAGIOS RESTART</a> 
    </div>
</div>
<script src="/bower_components/foundation/js/vendor/jquery.js"></script>
<script src="/bower_components/foundation/js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
<script>
jQuery(function(){
    var hideAlertBox = function(){ 
        $('.notification-box').hide() ;
    }

    hideAlertBox() ;

    $('.provisioning-btn').click(function(){
        showAlertBox('warning','provisioning...') ;
        $.ajax({
            url : '/admin/configuration/provisioning/request' , 
            type: 'get',
            success: function(response){
                showAlertBox('success','Success  ') ;
                location.href = location.href ;
            },
            error : function(response){
                showAlertBox('alert','Error') ;
            }
        }); 
    });

    $('a.restart-btn').click(function(){ 
        showAlertBox('warning','nagios restarting...') ;
        $.ajax({
            url : '/admin/dashboard/nagios_restart' , 
            type: 'get',
            success: function(response){
                showAlertBox('success','Success  ') ;
            },
            error : function(response){
                showAlertBox('alert','Error') ;
            }
        }); 

    });

    $('#generate-host-file').click(function(){
        showAlertBox('warning','host file are generationg...') ;
        $.ajax({
            url : '/admin/hosts/generate' , 
            type: 'get',
            success: function(response){
                showAlertBox('success','Done : Host File are generated') ;
            },
            error : function(response){
                showAlertBox('alert','Error') ;
            }
        }); 
    });

    $('#generate-service-file').click(function(){
        showAlertBox('warning','service file are generationg...') ;
        $.ajax({
            url : '/admin/services/generate' , 
            type: 'get',
            success: function(response){
                showAlertBox('success','Done : Service File are generated') ;
            },
            error : function(response){
                showAlertBox('alert','Error') ;
            }
        }); 

    });

    $('#generate-command-file').click(function(){ 
        showAlertBox('warning','command file are generationg...') ;
        $.ajax({
            url : '/admin/commands/generate' , 
            type: 'get',
            success: function(response){
                showAlertBox('success','Done : Command File are generated') ;
            },
            error : function(response){
                showAlertBox('alert','Error') ;
            }
        }); 
    }); 

    
    var showAlertBox = function(cls , text){ 
        $('.notification-box').removeClass('warning') ;
        $('.notification-box').removeClass('alert') ;
        $('.notification-box').removeClass('success') ;

        $('.notification-box').addClass(cls) ;
        $('.notification-box').show() ;
        $('.notification-box').text(text) ;
    } 

});
</script>
@yield('scripts')
</body>
</html>
