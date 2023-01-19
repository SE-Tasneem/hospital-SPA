<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Clinic;
use Illuminate\Http\Request;
use DataTables;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.appointments.index');
    }

    public function indexData(Request $request)
    {

        $appointments = Appointment::orderBy('id', 'desc')->get();
        return DataTables::of($appointments)
            ->addColumn('clinic', function ($appointment) {
                return (session()->get('locale') == 'ar' ? $appointment->clinic->name : $appointment->clinic->en_name);
            })
            ->addColumn('doctor_name', function ($appointment) {
                return (session()->get('locale') == 'ar' ? $appointment->doctor_name : $appointment->en_doctor_name);
            })
            ->addColumn('day', function ($appointment) {
                return trans('main.' . $appointment->day);
            })
            ->addColumn('edit', function ($appointment) {
                $action = '<a href="/admin-dashboard/appointments/' . $appointment->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                return $action;
            })
            ->addColumn('delete', function ($appointment) {
                $action = '<a href="/admin-dashboard/appointments/' . $appointment->id . '/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                return $action;
            })
            ->rawColumns(['text','en_text','edit', 'delete'])
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
        $clinics = Clinic::all();
        return view('dashboard.appointments.create', compact('clinics'));
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
          'clinic_id' => 'required',
          'doctor_name' => 'required',
          'en_doctor_name' => 'required',
          'day' => 'required',
          'time' => 'required'
        ]);

        $input = $request->all();
        $input['type'] = 'morning';
        $appointment = Appointment::create($input);
        return redirect()->to('admin-dashboard/appointments');
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
        $appointment = Appointment::find($id);
        $clinics = Clinic::all();
        return view('dashboard.appointments.edit', compact('appointment', 'clinics'));
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
          'clinic_id' => 'required',
          'doctor_name' => 'required',
          'en_doctor_name' => 'required',
          'day' => 'required',
          'time' => 'required'
        ]);

        $input = $request->all();
        $appointment = Appointment::find($id);
        $appointment->update($input);
        $appointment->save();
        return redirect()->to('admin-dashboard/appointments');
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
        if (Appointment::find($id)) {
            Appointment::find($id)->delete();
        }
        return redirect()->to('admin-dashboard/appointments');
    }
}
