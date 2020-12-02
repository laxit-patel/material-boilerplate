<?php

namespace App\Http\Controllers;

use App\Quote;
use App\Catagory;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use phpDocumentor\Reflection\Types\This;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = Catagory::all();
        return view('quote.create', compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $this->validate($request,[
            'catagory' => 'required',
            'quote' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',    
        ]);

        $image = $request->file('image');
        $filename = time().'.'.request()->image->getClientOriginalExtension();
        $path = public_path('images/' . $filename);
        
        $image_resize = Image::make($image->getRealPath())->resize(1000, 1000)->save($path);              

        $height = Image::make($image)->height();
        $width = Image::make($image)->width();

        //Generating unique link using hash function with checking function
        $quote = new Quote;
        $quote->user = auth()->user()->id;
        $quote->catagory_id = $request->catagory;
        $quote->quote = $request->quote;
        $quote->author = $request->author;
        $quote->image = $filename;
        $quote->link = sha1(time());
        $quote->save();
        
        return redirect('/view-quote')->with('status', 'Quote Generated!!!');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        $quotes = DB::table('quotes')
        ->join('catagories','catagories.id','=','quotes.catagory_id')
        ->select('quotes.id','quotes.catagory_id','quotes.image','quotes.quote','quotes.author','catagories.catagory')
        ->get();
        return view('quote.view', compact('quotes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote = Quote::find($id);
        $quote->delete();
        return back()->with('status', 'Quote Removed!');
    }
}
