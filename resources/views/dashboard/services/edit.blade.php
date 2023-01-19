
@extends('dashboard.layouts.base')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <div class="page-header">
                    <h1>{{__('main.edit')}}</h1>
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
                            {!! Form::open(['url' => 'admin-dashboard/services/'.$service->id,'files' => true,'id'=>'form']) !!}
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-group row">
                            <label class="col-sm-1">{{__('main.name')}}</label>
                            <div class=" col-sm-11">
                                <input type="text" class="form-control" name="name" value="{!! $service->name !!}" placeholder="{{__('main.name')}}" required>
                            </div>
                        </div>

                            <div class="form-group row">
                            <label class="col-sm-1">{{__('main.en_name')}}</label>
                            <div class=" col-sm-11">
                                <input type="text" class="form-control" name="en_name" value="{!! $service->en_name !!}" placeholder="{{__('main.en_name')}}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-1">{{__('main.description')}}</label>
                            <div class=" col-sm-11">
                              <textarea rows="4" cols="128" name="description" id="description">
                                {!! $service->description !!}
                              </textarea>
                            </div>
                        </div>

                            <div class="form-group row">
                                <label class="col-sm-1">{{__('main.en_description')}}</label>
                                <div class=" col-sm-11">
                                  <textarea rows="4" cols="128" name="en_description" id="en_description">
                                    {!! $service->en_description !!}
                                  </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-1">{{__('main.old_image')}}</label>
                                <div class=" col-sm-11">
                                    <img src="{!! asset('/images/services/'.$service->image) !!}" width="262" height="150" class="image-responsive">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-1">{{__('main.image')}}</label>
                                <div class=" col-sm-11">
                                    <input type="file" name="image" id="id-input-file-3" />
                                </div>
                            </div>

                        <div class="row">
                            <div class="input-field col">
                                <button type="submit" class="btn btn-primary btn-block">{{__('main.edit_btn')}}</button>
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
                preview_error : function(filename, error_code) {
                }

            }).on('change', function(){
            });
        });
    </script>

@endsection