<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Clinic;
use Illuminate\Http\Request;
use DataTables;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.clinics.index');
    }

    public function indexData(Request $request)
    {

        $clinics = Clinic::orderBy('id', 'desc')->get();
        return DataTables::of($clinics)
            ->addColumn('edit', function ($clinic) {
                $action = '';
                $action .= '<a href="/admin-dashboard/clinics/' . $clinic->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                return $action;
            })
            ->addColumn('delete', function ($clinic) {
                $action = '';
                $action .= '<a href="/admin-dashboard/clinics/' . $clinic->id . '/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                return $action;
            })
            ->rawColumns(['name','en_name','edit', 'delete'])
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
        return view('dashboard.clinics.create');
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
          'en_name' => 'required'
        ]);

        $input = $request->all();
        $clinic = Clinic::create($input);
        return redirect()->to('admin-dashboard/clinics');
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
        $clinic = Clinic::find($id);
        return view('dashboard.clinics.edit', compact('clinic'));
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
          'en_name' => 'required'
        ]);

        $input = $request->all();
        $clinic = Clinic::find($id);
        $clinic->name = $input['name'];
        $clinic->en_name = $input['en_name'];
        $clinic->save();
        return redirect()->to('admin-dashboard/clinics');
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
        if (Clinic::find($id)) {
            if (Appointment::where('clinic_id', $id)->count()) {
                return redirect()->back()->with('error', 'Cannot delete used clinic');
            }
            Clinic::find($id)->delete();
        }
        return redirect()->to('admin-dashboard/clinics');
    }
}
