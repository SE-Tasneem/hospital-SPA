<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use DataTables;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.doctors.index');
    }

    public function indexData(Request $request)
    {

        $doctors = Doctor::orderBy('id', 'desc')->get();
        return DataTables::of($doctors)
            ->addColumn('status', function ($doctor) {

                $input = '<label>';

                if ($doctor->status == 1) {
                    $input = '<input id="' . $doctor->id . '" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" checked>';
                } else {
                    $input = '<input id="' . $doctor->id . '" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" >';
                }
                return $input . '
                <span class="lbl"></span></label>';
            })
            ->addColumn('image', function ($doctor) {
                return '<img height="60" src="' . $doctor->image_full_path . '">';
            })
            ->addColumn('edit', function ($doctor) {
                $action = '';
                $action .= '<a href="/admin-dashboard/doctors/' . $doctor->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
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
        return view('dashboard.doctors.create');
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
        $request->validate([
          'name' => 'required',
          'en_name' => 'required',
          'department' => 'required',
          'en_department' => 'required'
        ]);

        $input = $request->all();

        $input['status'] = 1;

        $doctor = Doctor::create($input);

        if ($request->file('image')) {
            $file_name = md5($doctor->id . "store" . $doctor->id . rand(1, 1000));

            $file_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

            $file_full_name = $file_name . '.' . $file_ext;

            $uploads_folder =  getcwd() . '/images/doctors';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }


            $request->file('image')->move($uploads_folder, $file_name  . '.' . $file_ext);


            $doctor->image =  $file_full_name;
        }
        $doctor->save();

        return redirect()->to('admin-dashboard/doctors');
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
        $doctor = Doctor::find($id);
        return view('dashboard.doctors.edit', compact('doctor'));
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
        $request->validate([
          'name' => 'required',
          'en_name' => 'required',
          'department' => 'required',
          'en_department' => 'required'
        ]);

        $input = $request->all();
        $doctor = Doctor::find($id);
        $doctor->name = $input['name'];
        $doctor->department = $input['department'];
        $doctor->en_name = $input['en_name'];
        $doctor->en_department = $input['en_department'];

        if ($request->file('image')) {
            $file_name = md5($doctor->id . "store" . $doctor->id . rand(1, 1000));
            $file_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc
            $file_full_name = $file_name . '.' . $file_ext;
            $uploads_folder =  getcwd() . '/images/doctors';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('image')->move($uploads_folder, $file_name  . '.' . $file_ext);
            $doctor->image =  $file_full_name;
        }
        $doctor->save();

        return redirect()->to('admin-dashboard/doctors');
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
        $doctor = Doctor::find($id);
        $doctor->status = $request->get('status');
        $doctor->save();
        return 1;
    }
}
