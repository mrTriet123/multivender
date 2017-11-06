<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           @lang('quickadmin.quickadmin_title')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           @lang('quickadmin.quickadmin_title')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"></ul> 
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li> 
            <li class="dropdown user user-menu" style="margin-right: 20px;">
                <a href="#" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <img src="https://demo.sleepingowladmin.ru/images/blank.png" class="user-image"> 
                    <span class="hidden-xs">admin</span>
                </a> 
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <img src="https://demo.sleepingowladmin.ru/images/blank.png" class="img-circle"> 
                        <p>admin
                            <small>Registered at 05.07.2017</small>
                        </p>
                    </li> 
                    <li class="user-footer">
                        <a href="#logout" onclick="$('#logout').submit();">
                            <!-- <i class="fa fa-arrow-left"></i> -->
                            <i class="fa fa-btn fa-sign-out"></i>
                            <span class="title">@lang('quickadmin.qa_logout')</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        </div>
        

    </nav>
</header>


