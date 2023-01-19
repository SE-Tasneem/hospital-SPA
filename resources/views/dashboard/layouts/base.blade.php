<!DOCTYPE html>
<html lang="ar">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>@yield('title',trans('main.site_title'))</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/bootstrap.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/font-awesome/4.5.0/css/font-awesome.min.css') !!}" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    {{--<link rel="stylesheet" href="{!! asset('/dashboard/assets/css/fonts.googleapis.com.css') !!}" />--}}
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>

    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/jquery-ui.custom.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/chosen.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/bootstrap-datepicker3.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/bootstrap-timepicker.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/daterangepicker.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/bootstrap-datetimepicker.min.css') !!}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/ace.min.css') !!}" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/ace-part2.min.css') !!}" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/ace-skins.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/ace-rtl.min.css') !!}" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{!! asset('/dashboard/assets/css/ace-ie.min.css') !!}" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{!! asset('/dashboard/assets/js/ace-extra.min.js') !!}"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{!! asset('/dashboard/assets/js/html5shiv.min.js') !!}"></script>
    <script src="{!! asset('/dashboard/assets/js/respond.min.js') !!}"></script>
    <script src="{!! asset('/dashboard/js/scripts.js') !!}"></script>
    <![endif]-->
</head>
<style>
    body {
        font-family: 'DroidArabicKufiRegular', sans-serif !important;
    }
</style>

<body class="no-skin rtl">
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-right">
            <a href="/" class="navbar-brand">
                <small>
                    {!! trans('main.site_title') !!}
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-left" role="navigation">
            <ul class="nav ace-nav">

                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{!! asset('dashboard/assets/images/avatars/user.jpg') !!}" alt="Jason's Photo" />
                        <span class="user-info">
									{!! Auth::user()->name !!}
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout')}}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off"></i>
                                {!! trans('main.logout') !!}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar responsive ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <ul class="nav nav-list">
            <li class="active">
                <a href="#">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> {!! trans('main.dashboard') !!} </span>
                </a>
                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="/admin-dashboard/services">
                    <i class="menu-icon fa fa-tasks"></i>
                    <span class="menu-text"> {!! trans('main.services') !!} </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
              <a href="/admin-dashboard/appointments">
                  <i class="menu-icon fa fa-tasks"></i>
                  <span class="menu-text"> {!! trans('main.appointments') !!} </span>
              </a>
              <b class="arrow"></b>
          </li>
            <li class="">
              <a href="/admin-dashboard/clinics">
                  <i class="menu-icon fa fa-tasks"></i>
                  <span class="menu-text"> {!! trans('main.clinics') !!} </span>
              </a>
              <b class="arrow"></b>
          </li>
            <li class="">
                <a href="/admin-dashboard/departments">
                    <i class="menu-icon fa fa-file"></i>
                    <span class="menu-text"> {!! trans('main.departments') !!} </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin-dashboard/images">
                    <i class="menu-icon fa fa-image"></i>
                    <span class="menu-text"> {!! trans('main.images') !!} </span>
                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin-dashboard/doctors">
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text"> {!! trans('main.doctors') !!} </span>
                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin-dashboard/adds">
                    <i class="menu-icon fa fa-file"></i>
                    <span class="menu-text"> {!! trans('main.adds') !!} </span>
                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/admin-dashboard/company-profile">
                    <i class="menu-icon fa fa-building"></i>
                    <span class="menu-text"> {!! trans('main.company_profile') !!} </span>
                </a>

                <b class="arrow"></b>
            </li>


        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>

@yield('content')

    <div class="footer">
        <div class="footer-inner">
            <div class="footer-content">
						<span class="bigger-120">
							{{--<span class="blue bolder">Ace</span>--}}
						</span>

                &nbsp; &nbsp;
                {{--<span class="action-buttons">--}}
							{{--<a href="#">--}}
								{{--<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>--}}
							{{--</a>--}}

							{{--<a href="#">--}}
								{{--<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>--}}
							{{--</a>--}}

							{{--<a href="#">--}}
								{{--<i class="ace-icon fa fa-rss-square orange bigger-150"></i>--}}
							{{--</a>--}}
						{{--</span>--}}
            </div>
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{!! asset('/dashboard/assets/js/jquery-2.1.4.min.js') !!}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="{!! asset('/dashboard/assets/js/jquery-1.11.3.min.js') !!}"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="{!! asset('/dashboard/assets/js/bootstrap.min.js') !!}"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="{!! asset('/dashboard/assets/js/excanvas.min.js') !!}"></script>
<![endif]-->
<script src="{!! asset('/dashboard/assets/js/jquery-ui.custom.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/jquery.ui.touch-punch.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/jquery.easypiechart.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/jquery.sparkline.index.min.js') !!}"></script>


<script src="{!! asset('/dashboard/assets/js/jquery-ui.custom.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/jquery.ui.touch-punch.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/markdown.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/bootstrap-markdown.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/jquery.hotkeys.index.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/bootstrap-wysiwyg.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/bootbox.js') !!}"></script>


<!-- ace scripts -->
<script src="{!! asset('/dashboard/assets/js/ace-elements.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/bootstrap-datepicker.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/bootstrap-timepicker.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/moment.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/daterangepicker.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/bootstrap-datetimepicker.min.js') !!}"></script>
<script src="{!! asset('/dashboard/assets/js/ace.min.js') !!}"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{!! asset('dashboard/js/datatable.js') !!}"></script>
<script src="{!! asset('/dashboard/js/scripts.js?v=0.2') !!}"></script>

@yield('script')
</body>
</html>
