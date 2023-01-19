
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
                        <div class="table-responsive">
                        <table class="table table-bordered" >
                            <tr>
                                <th></th>
                                <th>{!! trans('main.arabic') !!}</th>
                                <th>{!! trans('main.english') !!}</th>
                            </tr>
                            <tr>
                                <th>{!! trans('main.name') !!}</th>
                                <td>{!! $company_profile->name !!}</td>
                                <td>{!! $company_profile->en_name !!}</td>
                            </tr>
                            <tr>
                                <th>{!! trans('main.mobile') !!}</th>
                                <td colspan="2">{!! $company_profile->mobile !!}</td>
                            </tr>
                            <tr>
                                <th>{!! trans('main.email') !!}</th>
                                <td colspan="2">{!! $company_profile->email !!}</td>
                            </tr>
                            <tr>
                                <th>{!! trans('main.address') !!}</th>
                                <td>{!! $company_profile->address !!}</td>
                                <td>{!! $company_profile->en_address !!}</td>
                            </tr>
                            <tr>
                                <th>{!! trans('main.about') !!}</th>
                                <td>{!! $company_profile->about !!}</td>
                                <td>{!! $company_profile->en_about !!}</td>
                            </tr>
                            <tr>
                                <th>{!! trans('main.values') !!}</th>
                                <td>{!! $company_profile->values !!}</td>
                                <td>{!! $company_profile->en_values !!}</td>
                            </tr>
                            <tr>
                                <th>{!! trans('main.message') !!}</th>
                                <td>{!! $company_profile->message !!}</td>
                                <td>{!! $company_profile->en_message !!}</td>
                            </tr>
                            <tr>
                                <th>{!! trans('main.goals') !!}</th>
                                <td>{!! $company_profile->goals !!}</td>
                                <td>{!! $company_profile->en_goals !!}</td>
                            </tr>
                            <tr>
                                <th>{!! trans('main.vision') !!}</th>
                                <td>{!! $company_profile->vision !!}</td>
                                <td>{!! $company_profile->en_vision !!}</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <a href="{!! url('/admin-dashboard/company-profile/edit') !!}" class="btn btn-primary btn-block">{{__('main.edit_btn')}}</a>
                                </td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


@endsection