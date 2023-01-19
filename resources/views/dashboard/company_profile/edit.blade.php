
@extends('dashboard.layouts.base')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <div class="page-header">
                    <h1>{{__('main.company_profile')}}</h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-sm-12">
                        <form action="/admin-dashboard/company-profile/update" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered" >
                                <tr>
                                    <th></th>
                                    <th>{!! trans('main.arabic') !!}</th>
                                    <th>{!! trans('main.english') !!}</th>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.name') !!}</th>
                                    <td>
                                        <input class="form-control" name="name" value="{!! $company_profile->name !!}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" name="en_name" value="{!! $company_profile->en_name !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.mobile') !!}</th>
                                    <td colspan="2">
                                        <input class="form-control" name="mobile" value="{!! $company_profile->mobile !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.email') !!}</th>
                                    <td colspan="2">
                                        <input class="form-control" name="email" value="{!! $company_profile->email !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.address') !!}</th>
                                    <td>
                                        <input class="form-control" name="address" value="{!! $company_profile->address !!}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" name="en_address" value="{!! $company_profile->en_address !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.about') !!}</th>
                                    <td colspan="2">
                                        <textarea class="form-control" id="editor"  name="about" required>{!! $company_profile->about !!}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.about') !!}</th>
                                    <td colspan="2">
                                        <textarea class="form-control" id="editor2" name="en_about" required>{!! $company_profile->en_about !!}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.values') !!}</th>
                                    <td>
                                        <input class="form-control" name="values" value="{!! $company_profile->values !!}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" name="en_values" value="{!! $company_profile->values !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.message') !!}</th>
                                    <td>
                                        <input class="form-control" name="message" value="{!! $company_profile->message !!}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" name="en_message" value="{!! $company_profile->en_message !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.goal_1') !!}</th>
                                    <td>
                                        <input class="form-control" name="goals[]" value="{!! $company_profile->goals[0] !!}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" name="en_goals[]" value="{!! $company_profile->en_goals[0] !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.goal_2') !!}</th>
                                    <td>
                                        <input class="form-control" name="goals[]" value="{!! $company_profile->goals[1] !!}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" name="en_goals[]" value="{!! $company_profile->en_goals[1] !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.goal_3') !!}</th>
                                    <td>
                                        <input class="form-control" name="goals[]" value="{!! $company_profile->goals[2] !!}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" name="en_goals[]" value="{!! $company_profile->en_goals[2] !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.goal_4') !!}</th>
                                    <td>
                                        <input class="form-control" name="goals[]" value="{!! $company_profile->goals[3] !!}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" name="en_goals[]" value="{!! $company_profile->en_goals[3] !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.goal_5') !!}</th>
                                    <td>
                                        <input class="form-control" name="goals[]" value="{!! $company_profile->goals[4] !!}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" name="en_goals[]" value="{!! $company_profile->en_goals[4] !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{!! trans('main.vision') !!}</th>
                                    <td>
                                        <input class="form-control" name="vision" value="{!! $company_profile->vision !!}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" name="en_vision" value="{!! $company_profile->en_vision !!}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <button type="submit" class="btn btn-success btn-block">{{__('main.edit_btn')}}</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
  ClassicEditor
      .create( document.querySelector( '#editor2' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
@endsection