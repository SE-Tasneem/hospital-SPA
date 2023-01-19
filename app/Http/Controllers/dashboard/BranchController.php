<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Branch;
use Illuminate\Http\Request;

use DataTables;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.branches.index');
    }

    public function index_data(Request $request)
    {

        $branches = Branch::orderBy('id', 'desc')->get();
        return DataTables::of($branches)
            ->addColumn('edit', function ($branch) {
                $action = '';
                $action .= '<a href="/admin-dashboard/branches/'.$branch->id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
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
        return view('dashboard.branches.create');
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
        $request->validate(['name'=>'required','en_name'=>'required']);

        $input = $request->all();

        $input['status'] = 1;

        $branch = Branch::create($input);

        $branch->save();

        return redirect()->action('dashboard\BranchController@index');
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
        $branch = Branch::find($id);
        return view('dashboard.branches.edit',compact('branch'));
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
        $request->validate(['name'=>'required','en_name'=>'required']);

        $input = $request->all();


        $branch = Branch::find($id);
        $branch->name = $input['name'];
        $branch->address = $input['address'];
        $branch->en_name = $input['en_name'];
        $branch->en_address = $input['en_address'];

        $branch->save();


        return redirect()->action('dashboard\BranchController@index');
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
