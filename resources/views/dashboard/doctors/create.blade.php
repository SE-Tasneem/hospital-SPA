@extends('dashboard.layouts.base')
@section('content')
<div class="main-content">
  <div class="main-content-inner">
    <div class="page-content">

      <div class="page-header">
        <h1>{{__('main.new_doctor')}}</h1>
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
          {!! Form::open(['url' => 'admin-dashboard/doctors','files' => true,'id'=>'form']) !!}
          @csrf
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.name')}}</label>
            <div class=" col-sm-11">
              <input type="text" class="form-control" name="name" placeholder="{{__('main.name')}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.en_name')}}</label>
            <div class=" col-sm-11">
              <input type="text" class="form-control" name="en_name" placeholder="{{__('main.en_name')}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-1">{{__('main.department')}}</label>
            <div class=" col-sm-11">
              <input type="text" class="form-control" name="department" placeholder="{{__('main.department')}}"
                required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.en_department')}}</label>
            <div class=" col-sm-11">
              <input type="text" class="form-control" name="en_department" placeholder="{{__('main.en_department')}}"
                required>
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