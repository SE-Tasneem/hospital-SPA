
@extends('dashboard.layouts.base')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <div class="page-header">
                    <h1>{{__('main.new_images')}}</h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-10">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger contact__msg" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        @if(session()->get('success'))
                            <div class="alert alert-success contact__msg" role="alert">
                                {!! trans('strings.success') !!}
                            </div>
                        @endif
                        {!! Form::open(['url' => 'admin-dashboard/images','files' => true,'id'=>'form']) !!}
                        @csrf
                          <div class="form-group row">
                              <label class="col-sm-1">{{__('main.image')}}</label>
                              <div class=" col-sm-11">
                                  <input type="file" name="images[]" multiple="true" id="id-input-file-3" />
                              </div>
                          </div>

                          <div class="row">
                              <div class="input-field col">
                                  <button type="submit" class="btn btn-primary btn-block">{{__('main.add_btn')}}</button>
                              </div>
                          </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script src="{!! asset('/dashboard/assets/js/ace-elements.min.js') !!}"></script>
    <script src="{!! asset('/dashboard/assets/js/ace.min.js') !!}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#id-input-file-1 , #id-input-file-2').ace_file_input({
                no_file:'No File ...',
                btn_choose:'Choose',
                btn_change:'Change',
                droppable:false,
                onchange:null,
                thumbnail:false 
            });

            $('#id-input-file-3').ace_file_input({
                style: 'well',
                btn_choose: 'Drop files here or click to choose',
                btn_change: null,
                no_icon: 'ace-icon fa fa-cloud-upload',
                droppable: true,
                thumbnail: 'small',
                multiple: true,
                preview_error : function(filename, error_code) {
                }

            }).on('change', function(){
            });
        });
    </script>

    @endsection