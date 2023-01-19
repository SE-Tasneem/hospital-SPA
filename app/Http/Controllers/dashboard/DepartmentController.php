<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.departments.index');
    }

    public function indexData(Request $request)
    {

        $departments = Department::orderBy('id', 'desc')->get();
        return DataTables::of($departments)
            ->addColumn('status', function ($department) {

                $input = '<label>';

                if ($department->status == 1) {
                    $input = '<input id="' . $department->id . '" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" checked>';
                } else {
                    $input = '<input id="' . $department->id . '" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" >';
                }
                return $input . '
                <span class="lbl"></span></label>';
            })
            ->addColumn('image', function ($department) {
                return '<img height="60" src="' . $department->image_full_path . '">';
            })
            ->addColumn('edit', function ($department) {
                $action = '';
                $action .= '<a href="/admin-dashboard/departments/' . $department->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
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
        return view('dashboard.departments.create');
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

        $department = Department::create($input);

        if ($request->file('image')) {
            $file_name = md5($department->id . "store" . $department->id . rand(1, 1000));

            $file_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

            $file_full_name = $file_name . '.' . $file_ext;

            $uploads_folder =  getcwd() . '/images/departments';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }


            $request->file('image')->move($uploads_folder, $file_name  . '.' . $file_ext);


            $department->image =  $file_full_name;
        }
        $department->save();

        return redirect()->to('admin-dashboard/departments');
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
        $department = Department::find($id);
        return view('dashboard.departments.edit', compact('department'));
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


        $department = Department::find($id);
        $department->name = $input['name'];
        $department->description = $input['description'];
        $department->en_name = $input['en_name'];
        $department->en_description = $input['en_description'];

        if ($request->file('image')) {
            $file_name = md5($department->id . "store" . $department->id . rand(1, 1000));

            $file_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

            $file_full_name = $file_name . '.' . $file_ext;

            $uploads_folder =  getcwd() . '/images/departments';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }


            $request->file('image')->move($uploads_folder, $file_name  . '.' . $file_ext);


            $department->image =  $file_full_name;
        }

        $department->save();


        return redirect()->to('admin-dashboard/departments');
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
        $department = Department::find($id);
        $department->status = $request->get('status');
        $department->save();
        return 1;
    }
}
