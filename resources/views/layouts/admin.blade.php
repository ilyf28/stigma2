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
                    <li class="parent" style="border-left:5px solid #00BCD4;">
                        <a><i class="fi-monitor"></i>&nbsp;OBJECT</a>
                        <ul class="submenu">
                            <li><a href="{{route('admin.hosts.index')}}">Hosts</a></li>
                            <li><a href="{{route('admin.hosts.index')}}">Host Groups</a></li>
                            <li><a href="{{route('admin.services.index')}}">Services</a></li>
                            <li><a href="{{route('admin.hosts.index')}}">Service Groups</a></li>
                            <li><a href="{{route('admin.hosts.index')}}">Contacts</a></li>
                            <li><a href="{{route('admin.hosts.index')}}">Contact Groups</a></li>
                            <li><a href="{{route('admin.commands.index')}}">Commands</a></li>
                            <li><a href="{{route('admin.timeperiods.index')}}">Time Periods</a></li>
                        </ul>
                    </li>
                    <li class="parent" style="border-left:5px solid #6200EA;">
                        <a><i class="fi-monitor"></i>&nbsp;SYSTEM</a>
                        <ul class="submenu">
                            <li><a href="{{route('admin.hosts.index')}}">Configuration</a></li>
                            <li><a href="{{route('admin.hosts.index')}}">Account</a></li>
                        </ul>
                    </li>
                    <li class="parent" style="border-left:5px solid #C51162;">
                        <a><i class="fi-monitor"></i>&nbsp;EXECUTION</a>
                        <ul class="submenu">
                            <li><a href="{{route('admin.hosts.index')}}">Generate Config</a></li>
                            <li><a href="{{route('admin.hosts.index')}}">Nagios Restart</a></li>
                            <li><a href="{{ url('/auth/logout') }}"><i class="fi-unlock"></i>&nbsp;Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <div style="text-align:center;">
                    <a href="/admin/hosts/generate" style="color:#0078a0">make config</a>
                    <a href="/" style="color:#0078a0">Go to Monitoring</a>
                </div>
            </div>
        </div>
        <!-- end of sidebar-wrapper -->
        <div class="content-wrapper">
            <div class="content">
                @yield('contents')
            </div>
        </div>
    </div>
</div>

<script src="/bower_components/foundation/js/vendor/jquery.js"></script>
<script src="/bower_components/foundation/js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
<script>
// jQuery(function(){
    // var hideAlertBox = function(){ 
    //     $('.notification-box').hide() ;
    // }

    // hideAlertBox() ;

    // $('.provisioning-btn').click(function(){
    //     showAlertBox('warning','provisioning...') ;
    //     $.ajax({
    //         url : '/admin/configuration/provisioning/request' , 
    //         type: 'get',
    //         success: function(response){
    //             showAlertBox('success','Success  ') ;
    //             location.href = location.href ;
    //         },
    //         error : function(response){
    //             showAlertBox('alert','Error') ;
    //         }
    //     }); 
    // });

    // $('a.restart-btn').click(function(){ 
    //     showAlertBox('warning','nagios restarting...') ;
    //     $.ajax({
    //         url : '/admin/dashboard/nagios_restart' , 
    //         type: 'get',
    //         success: function(response){
    //             showAlertBox('success','Success  ') ;
    //         },
    //         error : function(response){
    //             showAlertBox('alert','Error') ;
    //         }
    //     }); 
    // });

    // $('#generate-host-file').click(function(){
    //     showAlertBox('warning','host file are generationg...') ;
    //     $.ajax({
    //         url : '/admin/hosts/generate' , 
    //         type: 'get',
    //         success: function(response){
    //             console.log(response);
    //             showAlertBox('success','Done : Host File are generated') ;
    //         },
    //         error : function(response){
    //             showAlertBox('alert','Error') ;
    //         }
    //     }); 
    // });

    // $('#generate-service-file').click(function(){
    //     showAlertBox('warning','service file are generationg...') ;
    //     $.ajax({
    //         url : '/admin/services/generate' , 
    //         type: 'get',
    //         success: function(response){
    //             showAlertBox('success','Done : Service File are generated') ;
    //         },
    //         error : function(response){
    //             showAlertBox('alert','Error') ;
    //         }
    //     }); 

    // });

    // $('#generate-command-file').click(function(){ 
    //     showAlertBox('warning','command file are generationg...') ;
    //     $.ajax({
    //         url : '/admin/commands/generate' , 
    //         type: 'get',
    //         success: function(response){
    //             showAlertBox('success','Done : Command File are generated') ;
    //         },
    //         error : function(response){
    //             showAlertBox('alert','Error') ;
    //         }
    //     }); 
    // }); 

    
    // var showAlertBox = function(cls , text){ 
    //     $('.notification-box').removeClass('warning') ;
    //     $('.notification-box').removeClass('alert') ;
    //     $('.notification-box').removeClass('success') ;

    //     $('.notification-box').addClass(cls) ;
    //     $('.notification-box').show() ;
    //     $('.notification-box').text(text) ;
    // } 

// });
</script>
@yield('scripts')
</body>
</html>
