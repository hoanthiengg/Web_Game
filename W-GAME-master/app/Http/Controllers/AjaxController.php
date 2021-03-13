<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

class AjaxController extends Controller
{
    public function loadcomment(Request $request){
        // $data =($request->except('_token'));
        // dd($data);
        $game_id = $request->game_id;
        $comment = DB::table('comment')->join('users','comment.user_id','=','users.id')
        ->select('comment.*', 'users.name')
        ->where('comment.game_id',$game_id)->orderBy('comment.created_at','DESC')->get();
        $xhtml = null;

        foreach ($comment as $com){
            if (Auth::check()) {
                if (Auth::user()->id == $com->user_id){
                    $xhtml.= '<div class="general-comments small-scrollbar" data-quote-url="#">
                    <div id="comment-251640" data-ts="1599060337" data-type="gameComment" data-item="" class="media js_commentRow      new">
                       <div class="media-left">
                          <a href="#" class="avatar" rel="nofollow">
                        
                          </a>
                       </div>
                       <div class="media-body">
                          <div class="media-heading">
                             <h5 class="author">
                                <span class="online_indicator online" data-online="" data-uid="2948531"></span>
                                <a href="#" rel="nofollow" data-profile="2948531" class="js_author">'.$com->name.'</a>
                             </h5>
                              <span style="margin-left: 10px;font-size: 10px;">'.date("d/m/Y",strtotime($com->created_at)).'</span>
                          </div>
                          <div class="content">
                             <div class="js_content" data-content-id="251640">
                                '.$com->content.'
                             </div>
                          </div>
                          <div class="comment-links clearfix">
                             <div class="pull-left">
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="row" >{{$comment->links()}}</div>
                    <hr>
                 </div>';
                
                }
                else{
                    $xhtml.= '<div class="general-comments small-scrollbar" data-quote-url="#">
                    <div id="comment-251640" data-ts="1599060337" data-type="gameComment" data-item="" class="media js_commentRow      new">
                       <div class="media-left">
                          <a href="#" class="avatar" rel="nofollow">
                         
                          </a>
                       </div>
                       <div class="media-body">
                          <div class="media-heading">
                             <h5 class="author">
                                <span class="online_indicator online" data-online="" data-uid="2948531"></span>
                                <a href="#" rel="nofollow" data-profile="2948531" class="js_author">'.$com->name.'</a>
                             </h5>
                              <span style="margin-left: 10px;font-size: 10px;">'.date("d/m/Y",strtotime($com->created_at)).'</span>
                          </div>
                          <div class="content">
                             <div class="js_content" data-content-id="251640">
                                '.$com->content.'
                             </div>
                          </div>
                          <div class="comment-links clearfix">
                             <div class="pull-left">
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="row" >{{$comment->links()}}</div>
                    <hr>
                 </div>';
                }
            } else {
                $xhtml.= '<div class="general-comments small-scrollbar" data-quote-url="#">
                <div id="comment-251640" data-ts="1599060337" data-type="gameComment" data-item="" class="media js_commentRow      new">
                   <div class="media-left">
                      <a href="#" class="avatar" rel="nofollow">
                      
                      </a>
                   </div>
                   <div class="media-body">
                      <div class="media-heading">
                         <h5 class="author">
                            <span class="online_indicator online" data-online="" data-uid="2948531"></span>
                            <a href="#" rel="nofollow" data-profile="2948531" class="js_author">'.$com->name.'</a>
                         </h5>
                          <span style="margin-left: 10px;font-size: 10px;">'.date("d/m/Y",strtotime($com->created_at)).'</span>
                      </div>
                      <div class="content">
                         <div class="js_content" data-content-id="251640">
                            '.$com->content.'
                         </div>
                      </div>
                      <div class="comment-links clearfix">
                         <div class="pull-left">
                         </div>
                      </div>
                   </div>
                </div>
                <div class="row" >{{$comment->links()}}</div>
                <hr>
             </div>';
            }        
    }
        return $xhtml;
    }

    public function addcomment(Request $request){
        $data =($request->except('_token'));
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        $request['id'] =  $data['game_id'];
       // dd($request);
        DB::table('comment')->insert($data);
        $xhtml = null;
        $xhtml = AjaxController::loadcomment($request);
        //dd($xhtml);
        return $xhtml;
    }


    public function xoacomment(Request $request){
      //dd($request);  
      $id = $request->idcm;     
        DB::table('comment')->where('id',$id)->delete();
        $xhtml = null;
        $xhtml = AjaxController::loadcomment($request);
       // dd($xhtml);
        return $xhtml;
    }
    public function mun(Request $request){  
      $count = DB::table('users')->select('money')->where('id',$request->id)->first();
     // dd($count);
      if ($count->money >= 500) {
         $xhtml = ' <a class="btn btn-danger" href="'.route('coin',['id'=>$request->gameid]).'" target="_blank">Get Link</a>';
        
      } else {
        
         $xhtml = ' <a class="btn btn-danger" href="#" target="_blank">Get Link</a>';
      }
      $data = DB::table('game')->where('id',$request->gameid)->first();
      $dl = $data->dowloand +1;
      DB::table('game')->where('id',$request->gameid)->update(['dowloand'=>$dl]);
     
      return $xhtml;
      
      
  }
}
