<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Offer;
use Illuminate\Http\Request;

use DataTables;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.offers.index');
    }

    public function index_data(Request $request)
    {

        $offers = Offer::orderBy('id','desc')->get();
        return DataTables::of($offers)
            ->addColumn('edit', function ($offer) {
                $action = '';
                $action .= '<a href="/admin-dashboard/offers/'.$offer->id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                return $action;
            })
            ->rawColumns(['name','edit'])
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
        return view('dashboard.offers.create');
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
        $request->validate(['title'=>'required','price'=>'required']);

        $input = $request->all();


        $offer = Offer::create($input);


        return redirect()->action('dashboard\OfferController@index');
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
        $offer = Offer::find($id);
        return view('dashboard.offers.edit',compact('offer'));
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
        $request->validate(['title'=>'required','price'=>'required']);

        $input = $request->all();


        $offer = Offer::find($id);
        $offer->title = $input['title'];
        $offer->en_title = $input['en_title'];
        $offer->description = $input['description'];
        $offer->en_description = $input['en_description'];
        $offer->price = $input['price'];

        $offer->save();


        return redirect()->action('dashboard\OfferController@index');
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
        $offer = Offer::find($id);
        $offer->status = $request->get('status');
        $offer->save();
        return 1;
    }
}
