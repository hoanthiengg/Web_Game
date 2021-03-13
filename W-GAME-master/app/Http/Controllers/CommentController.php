<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('game')->orderBy('id','DESC')->get();
        return view('cpadmin.modules.comment.index',['game'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table('comment')->where('id',$id)->delete();
        $xhtml = null;
        $xhtml = CommentController::showcomment($request);
        return $xhtml;
    }
    public function showcomment(Request $request)
    {
        $game_id = $request->game_id;
        $comment = DB::table('comment')->where('game_id',$game_id)->orderBy('id','DESC')->get();
        $xhtml = null;
        foreach ($comment as $c){
            $xhtml.='<tr><td>'.$c->id.'</td>
                    <td>'.$c->content.'</td>
                    <td>'.$c->user_id.'</td>
                    <td>'.date("d/m/Y-h:i:s",strtotime($c->created_at)).'</td>
                    <td><button type="submit" id="'.$c->id.'" data="'.$c->game_id.'" data-url="'.route('admin.comment.destroy').'" name="admin-xoacomment" class=" btn btn-danger p-1" style="margin-left: 10px;font-size: 12px;" >Xóa</button></td></tr>';
        }
        
        return $xhtml;
    }
}
