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
          {!! Form::open(['url' => 'admin-dashboard/appointments/'.$appointment->id,'files' => true,'id'=>'form']) !!}
          <input type="hidden" name="_method" value="PUT">
          @csrf
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.clinic')}}</label>
            <div class=" col-sm-11">
              <select class="form-control" class="requried" name="clinic_id">
                @foreach ($clinics as $clinic)
                  <option value="{{$clinic->id}}" @if($clinic->id == $appointment->clinic_id) selected @endif>{{ (session()->get('locale') == 'ar' ? $clinic->name : $clinic->en_name) }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.doctor_name')}}</label>
            <div class=" col-sm-11">
              <input type="text" class="form-control" name="doctor_name"
                placeholder="{{__('main.doctor_name')}}" value="{{$appointment->doctor_name}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.en_doctor_name')}}</label>
            <div class=" col-sm-11">
              <input type="text" class="form-control" name="en_doctor_name"
                placeholder="{{__('main.en_doctor_name')}}" value="{{$appointment->en_doctor_name}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.day')}}</label>
            <div class=" col-sm-11">
              <select class="form-control" class="requried" name="day">
                <option value="saturday" @if($appointment->day == 'saturday') selected @endif>{{__('main.saturday')}}</option>
                <option value="sunday" @if($appointment->day == 'sunday') selected @endif>{{__('main.sunday')}}</option>
                <option value="monday" @if($appointment->day == 'monday') selected @endif>{{__('main.monday')}}</option>
                <option value="tuesday" @if($appointment->day == 'tuesday') selected @endif>{{__('main.tuesday')}}</option>
                <option value="wednesday" @if($appointment->day == 'wednesday') selected @endif>{{__('main.wednesday')}}</option>
                <option value="thursday" @if($appointment->day == 'thursday') selected @endif>{{__('main.thursday')}}</option>
                <option value="friday" @if($appointment->day == 'friday') selected @endif>{{__('main.friday')}}</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1">{{__('main.time')}}</label>
            <div class=" col-sm-11">
              <input type="text" class="form-control" name="time" value="{{$appointment->time}}"
                placeholder="{{__('main.time')}}" required>
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