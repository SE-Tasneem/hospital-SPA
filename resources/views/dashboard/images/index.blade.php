
@extends('dashboard.layouts.base')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <div class="page-header">
                    <h1>{{__('main.gallery')}}</h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="invisible">
                            <button data-target="#sidebar2" data-toggle="collapse" type="button" class="pull-left navbar-toggle collapsed">
                                <span class="sr-only">Toggle sidebar</span>

                                <i class="ace-icon fa fa-dashboard white bigger-125"></i>
                            </button>

                            <div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse ace-save-state">
                                <ul class="nav nav-list">

                                    <li class="hover">
                                        <a href="{!! route('images.create') !!}">
                                            <i class="menu-icon fa fa-list-alt"></i>
                                            <span class="menu-text">{!! trans('main.create') !!}</span>
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                </ul><!-- /.nav-list -->
                            </div><!-- .sidebar -->
                        </div>



                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="data-table-images">
                            <thead>
                                <th>#</th>
                                <th>{!! trans('main.image') !!}</th>
                                <th>{!! trans('main.status') !!}</th>
                                <th>{!! trans('main.edit') !!}</th>
                                <th>{!! trans('main.delete') !!}</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

@endsection

@section('script')
    <script type="text/javascript">
        jQuery(function($) {
            $('#sidebar2').insertBefore('.page-content');

            $('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');


            $(document).on('settings.ace.two_menu', function(e, event_name, event_val) {
                if(event_name == 'sidebar_fixed') {
                    if( $('#sidebar').hasClass('sidebar-fixed') ) {
                        $('#sidebar2').addClass('sidebar-fixed');
                        $('#navbar').addClass('h-navbar');
                    }
                    else {
                        $('#sidebar2').removeClass('sidebar-fixed')
                        $('#navbar').removeClass('h-navbar');
                    }
                }
            }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed' ,$('#sidebar').hasClass('sidebar-fixed')]);

            $('#data-table-images').on('click', 'input', function () {
                var id = this.id;
                var value = 0;
                (this.checked) ? value = 1 : value = 0;
                $.ajax({
                    type:"get",
                    url: "{{url('/admin-dashboard/status-images')}}/"+id,
                    data:{'status': value},
                });

                $("#data-table-images")
                    .DataTable()
                    .ajax.reload();
            });
        })
    </script>
    @endsection