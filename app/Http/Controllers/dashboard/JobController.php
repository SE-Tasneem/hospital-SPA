<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Job;
use Illuminate\Http\Request;

use DataTables;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.jobs.index');
    }

    public function index_data(Request $request)
    {

        $jobs = Job::orderBy('id','desc')->get();
        return DataTables::of($jobs)
            ->addColumn('status', function($job) {

                $input = '<label>';

                if($job->status == 1)
                    $input = '<input id="'.$job->id.'" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" checked>';
                else
                    $input = '<input id="'.$job->id.'" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" >';
                return $input.'
                <span class="lbl"></span></label>';
            })
            ->addColumn('edit', function ($job) {
                $action = '';
                $action .= '<a href="/admin-dashboard/jobs/'.$job->id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                return $action;
            })
            ->rawColumns(['title','en_title','edit','status'])
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(['title'=>'required','details'=>'required']);

        $input = $request->all();

        $input['status'] = 1;

        $job = Job::create($input);

        $job->save();

        return redirect()->action('dashboard\JobController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $job = Job::find($id);
        return view('dashboard.jobs.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate(['title'=>'required','details'=>'required']);

        $input = $request->all();


        $job = Job::find($id);
        $job->title = $input['title'];
        $job->en_title = $input['en_title'];
        $job->details = $input['details'];
        $job->en_details = $input['en_details'];


        $job->save();


        return redirect()->action('dashboard\JobController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status(Request $request,$id)
    {
        $job = Job::find($id);
        $job->status = $request->get('status');
        $job->save();
        return 1;
    }
}
