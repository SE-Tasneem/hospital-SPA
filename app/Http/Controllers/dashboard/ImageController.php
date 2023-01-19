<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use DataTables;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.images.index');
    }

    public function indexData(Request $request)
    {

        $images = Image::orderBy('id', 'desc')->get();
        return DataTables::of($images)
            ->addColumn('status', function ($image) {

                $input = '<label>';

                if ($image->status == 1) {
                    $input = '<input id="' . $image->id . '" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" checked>';
                } else {
                    $input = '<input id="' . $image->id . '" name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" >';
                }
                return $input . '
                <span class="lbl"></span></label>';
            })
            ->addColumn('image', function ($image) {
                return '<img height="60" src="' . $image->image_full_path . '">';
            })
            ->addColumn('edit', function ($image) {
                $action = '<a href="/admin-dashboard/images/' . $image->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                return $action;
            })
            ->addColumn('delete', function ($image) {
              $action = '<a href="/admin-dashboard/images/' . $image->id . '/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
              return $action;
          })
            ->rawColumns(['name', 'edit', 'delete', 'status', 'image'])
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
        return view('dashboard.images.create');
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
        $request->validate(['images' => 'required']);

        $input = $request->all();

        $input['status'] = 1;
        $input['image'] = '';
        foreach ($request->file('images') as $image) {
            $newImage = Image::create($input);
            $file_name = md5($newImage->id . "store" . $newImage->id . rand(1, 1000));
            $file_ext = $image->getClientOriginalExtension(); // example: png, jpg ... etc
            $file_full_name = $file_name . '.' . $file_ext;
            $uploads_folder =  getcwd() . '/images/gallery';
            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $image->move($uploads_folder, $file_name  . '.' . $file_ext);
            $newImage->image =  $file_full_name;
            $newImage->save();
        }

        return redirect()->to('admin-dashboard/images');
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
        $image = Image::find($id);
        return view('dashboard.images.edit', compact('image'));
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
        $request->validate(['image' => 'required']);

        $image = Image::find($id);
        if ($request->file('image')) {
            $file_name = md5($image->id . "store" . $image->id . rand(1, 1000));
            $file_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc
            $file_full_name = $file_name . '.' . $file_ext;
            $uploads_folder =  getcwd() . '/images/gallery';
            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('image')->move($uploads_folder, $file_name  . '.' . $file_ext);
            $image->image =  $file_full_name;
        }

        $image->save();


        return redirect()->to('admin-dashboard/images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Image::find($id)) {
          Image::find($id)->delete();
        }
        return redirect()->to('admin-dashboard/images');
    }

    public function status(Request $request, $id)
    {
        $image = Image::find($id);
        $image->status = $request->get('status');
        $image->save();
        return 1;
    }
}
