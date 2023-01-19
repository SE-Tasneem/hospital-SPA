<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Adds;
use Illuminate\Http\Request;
use DataTables;

class AddsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.adds.index');
    }

    public function indexData(Request $request)
    {

        $adds = Adds::orderBy('id', 'desc')->get();
        return DataTables::of($adds)
            ->addColumn('edit', function ($adds) {
                $action = '';
                $action .= '<a href="/admin-dashboard/adds/' . $adds->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                return $action;
            })
            ->addColumn('delete', function ($adds) {
                $action = '';
                $action .= '<a href="/admin-dashboard/adds/' . $adds->id . '/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
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
        return view('dashboard.adds.create');
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
          'text' => 'required',
          'en_text' => 'required'
        ]);

        $input = $request->all();
        $adds = Adds::create($input);
        return redirect()->to('admin-dashboard/adds');
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
        $adds = Adds::find($id);
        return view('dashboard.adds.edit', compact('adds'));
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
          'text' => 'required',
          'en_text' => 'required'
        ]);

        $input = $request->all();
        $adds = Adds::find($id);
        $adds->text = $input['text'];
        $adds->en_text = $input['en_text'];
        $adds->save();
        return redirect()->to('admin-dashboard/adds');
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
        if (Adds::find($id)) {
            Adds::find($id)->delete();
        }
        return redirect()->to('admin-dashboard/adds');
    }
}
