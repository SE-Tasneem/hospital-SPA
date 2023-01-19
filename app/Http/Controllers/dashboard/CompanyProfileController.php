<?php

namespace App\Http\Controllers\dashboard;

use App\Models\CompanyProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_profile = CompanyProfile::first();
        $goals = json_decode($company_profile->goals);
        $company_profile->goals = implode(" </br> ", $goals);
        $goals = json_decode($company_profile->en_goals);
        $company_profile->en_goals = implode(" </br> ", $goals);
        return view('dashboard.company_profile.index', compact('company_profile'));
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $company_profile = CompanyProfile::first();
        $company_profile->goals = json_decode($company_profile->goals);
        $company_profile->en_goals = json_decode($company_profile->en_goals);
        return view('dashboard.company_profile.edit', compact('company_profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $company_profile = CompanyProfile::first();

        $company_profile->update($input);


        if ($request->file('logo')) {
            $file_name = md5(rand(1, 1000));

            $file_ext = $request->file('logo')->getClientOriginalExtension(); // example: png, jpg ... etc

            $file_full_name = $file_name . '.' . $file_ext;

            $uploads_folder =  getcwd() . '/images/company';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('logo')->move($uploads_folder, $file_name  . '.' . $file_ext);


            $company_profile->logo =  $file_full_name;
        }
        $company_profile->save();

        return redirect()->to('admin-dashboard\company-profile');
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
}
