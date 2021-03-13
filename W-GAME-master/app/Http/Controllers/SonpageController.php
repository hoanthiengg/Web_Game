<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Auth;
class SonpageController extends Controller
{
    public function inforpage($id){
        $cost = DB::table('users')->where('id',$id)->first();
        $data = DB::table('category')->orderBy('id','DESC')->get();
        $game = DB::table('game')->where('id',$id)->first();
        $data1 = DB::table('comment')->join('users','comment.user_id','=','users.id')
        ->select('comment.*', 'users.name')
        ->where('comment.game_id',$id)->orderBy('comment.created_at','DESC')->take(6)->get();
        return view('childpage.infor',['listcategory'=>$data, 'game'=>$game,'comment'=>$data1,'money'=>$cost]);
    }
    public function ussetting($id){
        $data = DB::table('users')->where('id',$id)->first();

        return view('childpage.setting',['us'=>$data]);
    }
    public function search(Request $request)
    {
        if($request->get('query'))
        {
        $query = $request->get('query');
        $search = DB::table('game')->where('name', 'LIKE', "%{$query}%")->orderBy('updated_at','DESC')->get();
        $output = '<ul class="dropdown-menu" style=" position:relative">';
        foreach($search as $row)
        {
        $output .= '<tr>
        <li><a href="#">'.$row->name.'</a></li>
        </tr>';
        }
        $output .= '</ul>';
        echo $output;
        }
        return view('search',['Search'=>$search,]);
    }
    public function pagecategory($name){
        $data = DB::table('game')->where('category', 'like', '%'.$name.'%')->paginate(14);
        $title = "Game".str_replace('-',' ',$name);
        $topdown = DB::table('game')->orderBy('dowloand','DESC')->take(5)->get();
        $data1 = DB::table('category')->orderBy('id','DESC')->get();
        return view('childpage.sort',['gamecate'=>$data,'title' => $title ,'topdown'=>$topdown ,'listcategory'=>$data1]);
    }
    public function download($id){
        $data = DB::table('game')->where('id',$id)->first();
       $dl = $data->dowloand +1;
       DB::table('game')->where('id',$id)->update(['dowloand'=>$dl]);
        return Redirect::to($data->link);
    }
    public function allgame(){
        $allgame = DB::table('game')->orderBy('id','DESC')->paginate(15);
        $data = DB::table('category')->orderBy('id','DESC')->get();
        return view('childpage.allgame',['listcategory'=>$data,'allgame'=>$allgame]);
    }
    public function coin($id){
        
        $data = DB::table('game')->where('id',$id)->first();
        
       $dl = $data->dowloand +1;
       DB::table('game')->where('id',$id)->update(['dowloand'=>$dl]);
        return Redirect::to($data->link);
    }
}
