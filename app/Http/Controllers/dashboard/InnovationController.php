<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Innovation;
use Illuminate\Http\Request;

use DataTables;

class InnovationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.innovations.index');
    }

    public function index_data(Request $request)
    {

        $innovations = Innovation::orderBy('id','desc')->get();
        return DataTables::of($innovations)
            ->addColumn('status', function($innovation) {

                $input = '<label>';

                if($innovation->status == 1)
                    $input = '<input id="'.$innovation->id.'" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" checked>';
                else
                    $input = '<input id="'.$innovation->id.'" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" >';
                return $input.'
                <span class="lbl"></span></label>';
            })
            ->addColumn('edit', function ($innovation) {
                $action = '';
                $action .= '<a href="/admin-dashboard/innovations/'.$innovation->id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                return $action;
            })
            ->rawColumns(['name','edit','status'])
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
        return view('dashboard.innovations.create');
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
        $request->validate(['name'=>'required','description'=>'required']);

        $input = $request->all();

        $input['status'] = 1;

        $innovation = Innovation::create($input);

        if ($request->file('image')){

            $file_name = md5($innovation->id."store".$innovation->id . rand(1,1000));

            $file_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

            $file_full_name = $file_name . '.' . $file_ext;

            $uploads_folder =  getcwd() .'/images/innovations';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }


            $request->file('image')->move($uploads_folder, $file_name  . '.' . $file_ext);


            $innovation->image =  $file_full_name;

        }
        $innovation->save();

        return redirect()->action('dashboard\InnovationController@index');
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
        $innovation = Innovation::find($id);
        return view('dashboard.innovations.edit',compact('innovation'));
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
        $request->validate(['name'=>'required','description'=>'required']);

        $input = $request->all();


        $innovation = Innovation::find($id);
        $innovation->name = $input['name'];
        $innovation->description = $input['description'];
        $innovation->en_name = $input['en_name'];
        $innovation->en_description = $input['en_description'];

        if ($request->file('image')){

            $file_name = md5($innovation->id."store".$innovation->id . rand(1,1000));

            $file_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

            $file_full_name = $file_name . '.' . $file_ext;

            $uploads_folder =  getcwd() .'/images/innovations';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }


            $request->file('image')->move($uploads_folder, $file_name  . '.' . $file_ext);


            $innovation->image =  $file_full_name;

        }

        $innovation->save();


        return redirect()->action('dashboard\InnovationController@index');
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
        $innovation = Innovation::find($id);
        $innovation->status = $request->get('status');
        $innovation->save();
        return 1;
    }
}
