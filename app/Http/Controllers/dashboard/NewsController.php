<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

use DataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.news.index');
    }

    public function index_data(Request $request)
    {

        $news = News::orderBy('id','desc')->get();
        return DataTables::of($news)
            ->addColumn('status', function($item) {

                $input = '<label>';

                if($item->status == 1)
                    $input = '<input id="'.$item->id.'" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" checked>';
                else
                    $input = '<input id="'.$item->id.'" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" >';
                return $input.'
                <span class="lbl"></span></label>';
            })
            ->addColumn('edit', function ($item) {
                $action = '';
                $action .= '<a href="/admin-dashboard/news/'.$item->id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
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
        return view('dashboard.news.create');
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

        $item = News::create($input);

        if ($request->file('image')){

            $file_name = md5($item->id."store".$item->id . rand(1,1000));

            $file_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

            $file_full_name = $file_name . '.' . $file_ext;

            $uploads_folder =  getcwd() .'/images/news';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }


            $request->file('image')->move($uploads_folder, $file_name  . '.' . $file_ext);


            $item->image =  $file_full_name;

        }
        $item->save();

        return redirect()->action('dashboard\NewsController@index');
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
        $item = News::find($id);
        return view('dashboard.news.edit',compact('item'));
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


        $item = News::find($id);
        $item->name = $input['name'];
        $item->description = $input['description'];
        $item->en_name = $input['en_name'];
        $item->en_description = $input['en_description'];

        if ($request->file('image')){

            $file_name = md5($item->id."store".$item->id . rand(1,1000));

            $file_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

            $file_full_name = $file_name . '.' . $file_ext;

            $uploads_folder =  getcwd() .'/images/news';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }


            $request->file('image')->move($uploads_folder, $file_name  . '.' . $file_ext);


            $item->image =  $file_full_name;

        }

        $item->save();


        return redirect()->action('dashboard\NewsController@index');
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
        $item = News::find($id);
        $item->status = $request->get('status');
        $item->save();
        return 1;
    }
}
