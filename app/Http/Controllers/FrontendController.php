<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    public function index()
    {
        $quotes = DB::table('quotes')
        ->join('catagories','catagories.id','=','quotes.catagory_id')
        ->join('users','users.id','=','quotes.user')
        ->select('quotes.id','quotes.catagory_id','quotes.image','quotes.quote','quotes.author','quotes.link','catagories.catagory','users.name')
        ->Paginate(25);
        return view('frontend.quotes', compact('quotes'));
    }

    public function gaze($link)
    {
        $quote = DB::table('quotes')
        ->join('catagories','catagories.id','=','quotes.catagory_id')
        ->where('link',$link)->first();
        return view('frontend.gaze', compact('quote'));
    }
}
