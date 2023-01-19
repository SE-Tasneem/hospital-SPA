<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.services.index');
    }

    public function indexData(Request $request)
    {

        $services = Service::orderBy('id', 'desc')->get();
        return DataTables::of($services)
            ->addColumn('status', function ($service) {

                $input = '<label>';

                if ($service->status == 1) {
                    $input = '<input id="' . $service->id . '" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" checked>';
                } else {
                    $input = '<input id="' . $service->id . '" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" >';
                }
                return $input . '
                <span class="lbl"></span></label>';
            })
            ->addColumn('image', function ($service) {
                return '<img height="60" src="' . $service->image_full_path . '">';
            })
            ->addColumn('edit', function ($service) {
                $action = '';
                $action .= '<a href="/admin-dashboard/services/' . $service->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                return $action;
            })
            ->rawColumns(['name','edit','status', 'image'])
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
        return view('dashboard.services.create');
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
        $request->validate(['name' => 'required','description' => 'required']);

        $input = $request->all();

        $input['status'] = 1;

        $service = Service::create($input);

        if ($request->file('image')) {
            $file_name = md5($service->id . "store" . $service->id . rand(1, 1000));

            $file_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

            $file_full_name = $file_name . '.' . $file_ext;

            $uploads_folder =  getcwd() . '/images/services';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }


            $request->file('image')->move($uploads_folder, $file_name  . '.' . $file_ext);


            $service->image =  $file_full_name;
        }
        $service->save();

        return redirect()->to('admin-dashboard/services');
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
        $service = Service::find($id);
        return view('dashboard.services.edit', compact('service'));
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
        $request->validate(['name' => 'required','description' => 'required']);

        $input = $request->all();


        $service = Service::find($id);
        $service->name = $input['name'];
        $service->description = $input['description'];
        $service->en_name = $input['en_name'];
        $service->en_description = $input['en_description'];

        if ($request->file('image')) {
            $file_name = md5($service->id . "store" . $service->id . rand(1, 1000));

            $file_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

            $file_full_name = $file_name . '.' . $file_ext;

            $uploads_folder =  getcwd() . '/images/services';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }


            $request->file('image')->move($uploads_folder, $file_name  . '.' . $file_ext);


            $service->image =  $file_full_name;
        }

        $service->save();


        return redirect()->to('admin-dashboard/services');
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

    public function status(Request $request, $id)
    {
        $service = Service::find($id);
        $service->status = $request->get('status');
        $service->save();
        return 1;
    }
}
