@extends('dashboard.layouts.base')
@section('content')
<div class="main-content">
  <div class="main-content-inner">
    <div class="page-content">

      <div class="page-header">
        <h1>{{__('main.new_appointments')}}</h1>
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
          {!! Form::open(['url' => 'admin-dashboard/appointments','files' => true,'id'=>'form']) !!}
          @csrf
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.clinic')}}</label>
            <div class=" col-sm-11">
              <select class="form-control" class="requried" name="clinic_id">
                @foreach ($clinics as $clinic)
                  <option value="{{$clinic->id}}">{{ (session()->get('locale') == 'ar' ? $clinic->name : $clinic->en_name) }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.doctor_name')}}</label>
            <div class=" col-sm-11">
              <input type="text" class="form-control" name="doctor_name"
                placeholder="{{__('main.doctor_name')}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.en_doctor_name')}}</label>
            <div class=" col-sm-11">
              <input type="text" class="form-control" name="en_doctor_name"
                placeholder="{{__('main.en_doctor_name')}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.day')}}</label>
            <div class=" col-sm-11">
              <select class="form-control" class="requried" name="day">
                <option value="saturday">{{__('main.saturday')}}</option>
                <option value="sunday">{{__('main.sunday')}}</option>
                <option value="monday">{{__('main.monday')}}</option>
                <option value="tuesday">{{__('main.tuesday')}}</option>
                <option value="wednesday">{{__('main.wednesday')}}</option>
                <option value="thursday">{{__('main.thursday')}}</option>
                <option value="friday">{{__('main.friday')}}</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.time')}}</label>
            <div class=" col-sm-11">
              <input type="text" class="form-control" name="time"
                placeholder="{{__('main.time')}}" required>
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