<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Adds;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\CompanyProfile;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Image;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        //
        $locale = session()->get('locale');
        $services = Service::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $servicesList = Service::where('status', 1)->limit(5)->get();
        $services = $services->map(function ($service) use ($locale) {
            if ($locale == 'en') {
                $service->name = $service->en_name;
                $service->description = $service->en_description;
            }
            return $service;
        });
        $departments = Department::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $departmentsList = Department::where('status', 1)->limit(5)->get();
        $departments = $departments->map(function ($department) use ($locale) {
            if ($locale == 'en') {
                $department->name = $department->en_name;
                $department->description = $department->en_description;
            }
            return $department;
        });
        $doctors = Doctor::where('status', 1)->orderBy('created_at', 'ASC')->get();
        $doctors = $doctors->map(function ($doctor) use ($locale) {
            if ($locale == 'en') {
                $doctor->name = $doctor->en_name;
                $doctor->department = $doctor->en_department;
            }
            return $doctor;
        });
        $adds = Adds::orderBy('created_at', 'DESC')->get();
        $adds = $adds->map(function ($add) use ($locale) {
            if ($locale == 'en') {
                $add->text = $add->en_text;
            }
            return $add;
        });
        $clinics = Clinic::with(['appointments'])->get();
        $table = "";
        $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
        foreach ($clinics as $clinic) {
            if ($locale == 'en') {
                $clinic->name = $clinic->en_name;
            }
            $table .= "<tr><td>" . $clinic->name . "</td>";
            foreach ($days as $day) {
                $table .= "<td>";
                foreach ($clinic->appointments as $appointment) {
                    if ($locale == 'en') {
                        $appointment->doctor_name = $appointment->en_doctor_name;
                    }
                    if ($day == $appointment->day) {
                        $table .= "<hr/>";
                        $table .= $appointment->doctor_name;
                        $table .= "<br/>" . __('main.hour') . ": ";
                        $table .= $appointment->time;
                        $table .= "<hr/>";
                    }
                }
                $table .= "</td>";
            }
            $table .= "</tr>";
        }
        $profile = CompanyProfile::first();
        $profile->goals = json_decode($profile->goals);
        $profile->en_goals = json_decode($profile->en_goals);
        $images = Image::where('status', 1)->get();
        return view('home', compact('services', 'departments', 'doctors', 'profile', 'departmentsList', 'servicesList', 'images', 'adds', 'days', 'table'));
    }
}
