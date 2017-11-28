<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function registration_form(){
        return view('registration_form');
    }

    public function registration(Request $req){

        $name=$req->input('name');
        $id_no=$req->input('id_no');
        $hall_name=$req->input('hall_name');
        $dept=$req->input('dept');
        $level=$req->input('level');
        $term=$req->input('term');
        $student_type=$req->input('student_type');
        $course_no=$req->input('course_no');
        $nationality=$req->input('nationality');
        $advisor=" ";


        $data=array('student_id'=>$id_no,'name'=>$name,'department'=>$dept,'hall_name'=>$hall_name,'level'=>$level,'term'=>$term,'student_type'=>$student_type,'course_no'=>$course_no,'nationality'=>$nationality,'advisor'=>$advisor,'hall_transaction'=>" ",'course_transection'=>" ",'status'=>" ");


        DB::table('student_info')->insert($data);

        return view('registration')->with("id_no",$id_no);
    }


}
