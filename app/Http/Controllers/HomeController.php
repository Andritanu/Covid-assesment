<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request){
        $y1 = $request->y1;
        $y2 = $request->y2;
        $y3 = $request->y3;
        $y4 = $request->y4;
        $y5 = $request->y5;
        $y6 = $request->y6;
        $y6 = $request->y6;
        $y7 = $request->y7;
        $y8 = $request->y8;
        $y9 = $request->y9;
        $y10 = $request->y10;
        $y11 = $request->y11;
        $y12 = $request->y12;
        $y13 = $request->y13;
        $y14 = $request->y14;
        $y15 = $request->y15;
        $y16 = $request->y16;
        $y17 = $request->y17;
        $y18 = $request->y18;
        $y19 = $request->y19;
        $y20 = $request->y20;
        $y21 = $request->y21;

       

        $y = $y1 + $y2 + $y3 + $y4 + $y5 + $y6 + $y7 + $y8 + $y9 + $y10 + $y11 + $y12 + $y13 + $y14 + $y15 + $y16 + $y17 + $y18 + $y19 + $y20 + $y21;


        DB::beginTransaction();
        $survey = new Survey();
        $survey->user_id = $request->id;
        $survey->YA = $y;
        $survey->TIDAK = 0;
        $survey->save();

        $id = $request->id;

        DB::update("
            UPDATE users
            SET token = token + 1
            WHERE id = ?
        ", [$id]);

        DB::commit();
        return view('/out');
        
    }

    public function out($id, Request $request){
        $data = [];
        $scores = DB::select('
                SELECT * FROM surveys WHERE user_id = ?
        ',[$id]);

        $data['scores'] = $scores;

        return view('score', $data);
    }

}
