<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Job;
use App\JobRequest;
use Illuminate\Http\Request;

use DataTables;

class JobRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.job_requests.index');
    }

    public function index_data(Request $request)
    {

        $job_requests = JobRequest::orderBy('id','desc')->get();
        return DataTables::of($job_requests)
            ->addColumn('job', function($job_request) {
                return $job_request->job->title;
            })
            ->addColumn('cv_file', function($job_request) {
                return "<a href='".asset('/cv_files/'.$job_request->file)."'>".trans('main.download')."</a>";
            })
                ->addColumn('status', function($job_request) {

                $input = '<label>';

                if($job_request->status == 1)
                    $input = '<input id="'.$job_request->id.'" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" checked>';
                else
                    $input = '<input id="'.$job_request->id.'" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" >';
                return $input.'
                <span class="lbl"></span></label>';
            })
            ->rawColumns(['cv_file','job','status'])
            ->make(true);

    }


    public function status(Request $request,$id)
    {
        $job_request = JobRequest::find($id);
        $job_request->status = $request->get('status');
        $job_request->save();
        return 1;
    }
}
