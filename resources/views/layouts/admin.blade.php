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
                            <!-- <li><a href="{{route('admin.hosts.index')}}">Host Groups</a></li> -->
                            <li><a href="{{route('admin.services.index')}}">Services</a></li>
                            <!-- <li><a href="{{route('admin.hosts.index')}}">Service Groups</a></li> -->
                            <li><a href="{{route('admin.contacts.index')}}">Contacts</a></li>
                            <!-- <li><a href="{{route('admin.hosts.index')}}">Contact Groups</a></li> -->
                            <li><a href="{{route('admin.commands.index')}}">Commands</a></li>
                            <li><a href="{{route('admin.timeperiods.index')}}">Time Periods</a></li>
                        </ul>
                    </li>
                    <li class="parent" style="border-left:5px solid #6200EA;">
                        <a><i class="fi-monitor"></i>&nbsp;SYSTEM</a>
                        <ul class="submenu">
                            <li><a href="{{route('admin.system.configuration')}}">Configuration</a></li>
                            <li><a href="{{route('admin.system.account')}}">Account</a></li>
                        </ul>
                    </li>
                    <li class="parent" style="border-left:5px solid #C51162;">
                        <a><i class="fi-monitor"></i>&nbsp;EXECUTION</a>
                        <ul class="submenu">
                            <li><a href="{{route('admin.hosts.index')}}">Generate Config</a></li>
                            <li><a href="#" data-reveal-id="system-modal" class="restart"><i class="fi-power"></i>&nbsp;Nagios Restart</a></li>
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

<div id="system-modal" class="reveal-modal small modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <div class="modal-header">
        <h5 class="title">Nagios Serivce Restart</h5>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <div class="modal-body"> 
        <div data-alert class="alert-box radius notification-box" id="notification-box"> 
        </div>
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
    $('a.restart').click(function(){
        hideAlertBox();
    });

    $('a.restart-btn').click(function(){ 
        showAlertBox('warning', 'nagios restarting...');
        $.ajax({
            url : '/admin/dashboard/nagios_restart',
            type: 'get',
            success: function(response){
                showAlertBox('success', 'Success');
            },
            error : function(response){
                showAlertBox('alert', 'Error');
            }
        }); 
    });

    var hideAlertBox = function(){ 
        $('.notification-box').hide();
    }
    
    var showAlertBox = function(cls , text){ 
        $('.notification-box').removeClass('warning');
        $('.notification-box').removeClass('alert');
        $('.notification-box').removeClass('success');

        $('.notification-box').addClass(cls);
        $('.notification-box').show();
        $('.notification-box').text(text);
    } 

});
</script>
@yield('scripts')
</body>
</html>
