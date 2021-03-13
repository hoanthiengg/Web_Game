<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $data = DB::table('game')->orderBy('updated_at','DESC')->get();
        $cate = DB::table('category')->orderBy('updated_at','DESC')->get();
        $topdown = DB::table('game')->orderBy('dowloand','DESC')->take(9)->get();
        $randomSlider = DB::table('game')->orderBy('created_at','DESC')->take(4)->get();
        $data1 = DB::table('game')->orderBy('updated_at','DESC')->get()->take(9);
        return view('welcome',['GameView'=>$data,'listcategory'=>$cate,'topdown'=>$topdown,'slider'=>$randomSlider,'Gupdate'=>$data1,'topdown'=>$topdown]);  
    }
    public function home(){
        $thongtin = DB::table('game')->first();
        $data = DB::table('game')->orderBy('created_at','DESC')->take(5)->get();
        $count['game'] = DB::table('game')->count();
        $count['category'] = DB::table('category')->count();
        $count['uers'] = DB::table('users')->where('level','<',9)->count();
        $count['cmt'] = DB::table('comment')->count();
        $count['date'] = date("d/m/Y");
        $count['time'] =  date("h:i:sa");
        // dd($count);

        return view('cpadmin.modules.Dashboard',['items'=>$data,'count'=>$count, 'editinfor'=>$thongtin]);
    }
}
