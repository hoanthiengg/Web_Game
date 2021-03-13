@extends('master')
@section('title','Dark Side')
@section('content')
<style>
   .poi{
   text-align: center;
   font-weight: bold;
   }
   #content{
   }
   #img{
   width: 290px;
   height: 170px;
   border-radius: 5px 10px 4px 8px;
   }
   .dropdown-container {
   display: none;
   }
   #article{
   border-radius: 5px 10px 4px 8px;
   }
</style>
<div class="col-md-8">
   <div class="row general-info">
      {{-- @foreach ($game as $item) --}}
      <div class="col-xs-5 logos">
         <img id="img" src="{{asset('/imag/'.$game->image)}}" alt="{{$game->name}}" style="background-image:url('{{$game->image}}')" />
      </div>
      <div class="col-xs-7">
         <h1>{{$game->name}}</h1>
         <div class="row game-attrs">
            <div class="col-xs-4 col-md-3 text-muted small">Thể loại:</div>
            <div class="col-xs-8 col-md-9">
               <a href="#" class="item">{{$game->category}}</a>
            </div>
            <div class="col-xs-4 col-md-3 text-muted small">Nhà sản xuất:</div>
            <div class="col-xs-8 col-md-9">
               <span class="item">
               {{$game->producer}} {{--(<a href="https://taigame.org/developer/streamline-games">1 game</a>)--}}
               </span>
            </div>
            <div class="col-xs-4 col-md-3 text-muted small">Nhà phát hành:</div>
            <div class="col-xs-8 col-md-9">
               <span class="item">
               {{$game->publisher}} {{--(<a href="https://taigame.org/publisher/streamline-media-group">1 game</a>)--}}
               </span>
            </div>
            <div class="col-xs-4 col-md-3 text-muted small">Năm phát hành:</div>
            <div class="col-xs-8 col-md-9">{{$game->year}}</div>
         </div>
      </div>
   </div>
   <br>
   @if (Auth::check())
   @if(Auth::user()->money >= 500)
   <div class="row downloadInfo well">
      <div class="col-sm-9 text-muted">
         <div>Dung lượng cần tải về: {{$game->Capacity}}</div>
      </div>
      <div data-url=""></div>
      <a id="data" data-id="{{Auth::user()->id}}" data-url="{{route('mun')}}" href="javascript:;" class="download dropdown-btn btn btn-success btn-lg js_showDownloadLink" style="padding:8px;" type="button">
         <i class="fas fa-cloud-download-alt"></i>Tải Game </a>
         
         <div class="dropdown-container col-sm-12 text-center">
            <div class="col-sm-12 text-center" data-download-area="">
               <div class="text-left small">
                  <p>Chú ý: Để tải game không lỗi, hoặc lỗi vẫn có thể resume (tải tiếp, thay vì tải từ đầu), đề nghị bạn:</p>
                  <ul>
                     <li>
                        Tải bằng <a href="#" target="_blank">IDM</a> thay vì tải bằng trình duyệt.
                        Nếu IDM không tự bắt link, hãy cài
                        <a href="https://chrome.google.com/webstore/detail/idm-integration-module/ngpampappnmepgilojfohadhhmbhlaek" target="_blank">IDM addon</a>
                     </li>
                     <li>Nếu link chính không tải được, hãy sử dụng link dự phòng</li>
                  </ul>
               </div>
               <br>
               <a href="{{route('coin',['id'=>$game->id])}}" data-id="{{Auth::user()->id}}" id="link" data-url="{{route('mun')}}" target="_blank" data-cloud-link=""  game="{{$game->id}}">{{$game->name}}.rar</a>
               / <a href="/backup_link/VWF1d0hVRlNoUGJoNHJVeXN3VGlqblRYUmpWSGhQTFVldnlRanVVV0dHc203a2p1MUlDWjIzbzhRK3RIZ3EyVFdyb0h1K1prc1dpd0gvR2VYN2VFTkE9PQ==" data-link-ajax=""><b>Link dự phòng</b></a>
               <span class="part-size">({{$game->Capacity}})</span><br>
               <br>
               <p class="text-danger small">
                  Mật khẩu giải nén: <i>taigame.org</i><br>
               </p>
               <div id="tree-block"></div>
            </div>
         </div>
   </div>
      <script>
         var dropdown = document.getElementsByClassName("dropdown-btn");
         var i;
         
         for (i = 0; i < dropdown.length; i++) {
           dropdown[i].addEventListener("click", function() {
           this.classList.toggle("active");
           var dropdownContent = this.nextElementSibling;
           if (dropdownContent.style.display === "block") {
         
           dropdownContent.style.display = "none";
           } else {
           dropdownContent.style.display = "block";
           }
           });
         }
      </script>
   @else
   <div class="row downloadInfo well">
      <div class="col-sm-9 text-muted">
         <div>Dung lượng cần tải về: {{$game->Capacity}}</div>
      </div>
      <a href="javascript:;" class="dropdown-btn btn btn-success btn-lg js_showDownloadLink" style="padding:8px;" type="button">
         <i class="fas fa-cloud-download-alt"></i>Tải Game </a>
         <div class="dropdown-container col-sm-12 text-center">
   <div class="col-sm-12 text-center" data-download-area="">
      <div class="text-left" style="margin-top: 20px">
         <p>
            Từ ngày 5/7/2019, bạn chỉ có thể tải free 1 game đầu tiên trên trang web
            (<a href="https://taigame.org/forum/t2185/giam-phi-tai-game-thay-1-game-freengay-thanh-1-game-freeaccount" target="_blank" class="external">
            xem thông báo
            </a>).
         </p>
         <p>
            Để tiếp tục tải game, vui lòng <a href="https://taigame.org/donate/activatePopup" data-link-ajax="">nạp tiền</a>
            vào tài khoản. Mỗi game bạn lấy link sẽ trừ 500đ trong tài khoản của bạn.
            <span class="small">
            Link tính phí sẽ hiện vĩnh viễn với tài khoản của bạn, bạn có thể tải lại bất cứ lúc nào, nhận update phiên bản mới hoặc DLC mới trọn đời mà không cần phải mất phí lại lần nữa.
            </span>
         </p>
         <p class="text-center" style="margin: 20px 0"><a href="https://taigame.org/donate/activatePopup" data-link-ajax="" class="btn btn-primary">Nạp tiền vào tài khoản</a></p>
         <small class="text-muted">
         Vì trang web không đặt quảng cáo/popup, nên việc thu <em>phí download</em> là cần thiết để duy trì trang web.
         </small>
      </div>
   </div>
         </div>
   </div>
   <script>
      var dropdown = document.getElementsByClassName("dropdown-btn");
      var i;
      
      for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
      
        dropdownContent.style.display = "none";
        } else {
        dropdownContent.style.display = "block";
        }
        });
      }
   </script>
       @endif
   @else
   <div class="row downloadInfo well">
      <div class="col-sm-8 text-muted">
         Để tải game này về, bạn cần <a href="{{route('login')}}"  >đăng nhập</a><br>
         Nếu chưa có tài khoản, hãy <a href="{{route('register')}}" rel="nofollow">đăng ký tài khoản</a>.
      </div>
      <div class="col-sm-4 text-right">
         <a href="{{route('login')}}" class="btn btn-success btn-lg">
         <i class="fas fa-cloud-download-alt"></i>Tải Game
         </a>
      </div>
   </div>
   @endif
   <div class="game-content">
      <div class="thumbs steam clearfix " data-swiper-gallery="" >
         <a href="#" class="screen" data-ss="">
         </a>
      </div>
      <div class="article">
         <div class="thumbs steam clearfix" id="content">
            <h4 class="poi">Mô Tả</h4>
            {!!$game->description!!}
         </div>
         <div class="system-requirements alert alert-info">
            <h4>Cấu hình tối thiểu</h4>
            <pre>{{$game->configuration}}</pre>
         </div>
         {{-- @endforeach --}}
      </div>
   </div>
   @if(auth::check())
   <div class="panel panel-default with-nav-tabs">
      <div class="panel-heading">
         <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
               <a href="#js_commentTab" role="tab" data-toggle="tab">Bình luận game</a>
            </li>
         </ul>
      </div>
      <div class="panel-body">
         <div class="tab-content">
            <div id="js_commentTab" role="tabpanel" class="tab-pane active">
               @if (Auth::check())
               <form action="{{route('addcomment')}}" method="POST" id="formaddchat" class="well well-sm js_commentForm">
                  @csrf
                  <div class="media comment-posting">
                     <div class="media-body">
                        <div class="form-group">
                           <textarea class="form-control bg-dark" name="content" id="contenttext" rows="3"></textarea>
                        </div>
                        <div class="clearfix">
                           <div class="pull-right">
                              <input type="hidden" name="game_id" value="{{$game->id}}">
                              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                              <button id="btn-film-watch" type="submit" class="btn btn-primary btn-xs">
                              Gửi
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
               @else
               <div class="form-group">
               </div>
               @endif
               <div id="box-comment" data="{{$game->id}}" data-url="{{route('loadcomment')}}">
                  @foreach ($comment as $com)
                  @if (Auth::check())
                  @if (Auth::user()->id == $com->user_id)
                  <div class="general-comments small-scrollbar" data-quote-url="#">
                     <div id="{{$con->id}}" data-ts="{{$con->user_id}}" data-type="gameComment" data-item="" class="media js_commentRow      new">
                        <div class="media-left">
                           <a href="#" class="avatar" rel="nofollow">
                           <img src="{{asset('/imag/'.$item->image)}}" alt="{{$item->name}}" style="background-image:url('{{$item->image}}')" class="media-object" width="120px" height="70px">
                           </a>
                        </div>
                        <div class="media-body">
                           <div class="media-heading">
                              <h5 class="author">
                                 <span class="online_indicator online" data-online="" data-uid="2948531"></span>
                                 <a href="#" rel="nofollow" data-profile="{{$com->user_id}}" class="js_author">{{$com->name}}</a>
                              </h5>
                              <span style="margin-left: 10px;font-size: 10px;">{{date("d/m/Y",strtotime($com->created_at))}}</span>
                           </div>
                           <div class="content">
                              <div class="js_content" data-content-id="251640">
                                 {{$com->content}}
                              </div>
                           </div>
                           <div class="comment-links clearfix">
                              <div class="actions pull-right show-hide">
                                 <button  id="{{$com->id}}" data="{{$com->game_id}}" data-url="{{route('xoacomment')}}" name="dbtn" class="dbtn btn btn-danger p-1" style="margin-left: 10px;font-size: 12px;" >Xóa</button> 
                              </div>
                           </div>
                        </div>
                     </div>
                        {{-- <div class="row" >{{$comment->links()}}</div>
                     <hr>
                  </div> --}}
                  @else
                  <div class="general-comments small-scrollbar" data-quote-url="#">
                     <div id="comment-251640" data-ts="1599060337" data-type="gameComment" data-item="" class="media js_commentRow new">

                        <div class="media-body">
                           <div class="media-heading">
                              <h5 class="author">
                                 <span class="online_indicator online" data-online="" data-uid="2948531"></span>
                                 <a href="#" rel="nofollow" data-profile="2948531" class="js_author">{{$com->name}}</a>
                              </h5>
                              <span style="margin-left: 10px;font-size: 10px;">{{date("d/m/Y",strtotime($com->created_at))}}</span>
                           </div>
                           <div class="content">
                              <div class="js_content" data-content-id="251640">
                                 {{$com->content}}
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                  </div>
                  @endif
                  @else
                  <div class="general-comments small-scrollbar" data-quote-url="#">
                     <div id="comment-251640" data-ts="1599060337" data-type="gameComment" data-item="" class="media js_commentRow      new">
                        <div class="media-body">
                           <div class="media-heading">
                              <h5 class="author">
                                 <span class="online_indicator online" data-online="" data-uid="2948531"></span>
                                 <a href="#" rel="nofollow" data-profile="2948531" class="js_author">{{$com->name}}</a>
                              </h5>
                              <span style="margin-left: 10px;font-size: 10px;">{{date("d/m/Y",strtotime($com->created_at))}}</span>
                           </div>
                           <div class="content">
                              <div class="js_content" data-content-id="251640">
                                 {{$com->content}}
                              </div>
                           </div>
                        </div>
                     </div>
                     {{-- <div class="row" >{{$comment->links()}}</div>
                     <hr>
                  </div> --}}
                  @endif
                  @endforeach
               </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="js_ratingTab"></div>
         </div>
      </div>
   </div>
   @else
   <div class="panel panel-default with-nav-tabs">
      <div class="panel-heading">
         <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
               <a href="#js_commentTab" role="tab" data-toggle="tab">Bình luận game</a>
            </li>
         </ul>
      </div>
      <div class="panel-body">
         <div class="tab-content">
            <div id="js_commentTab" role="tabpanel" class="tab-pane active">
               <form method="post" action="#" class="well well-sm js_commentForm">
                  <p class="small text-muted" data-issue-toggle="" style="display: none">
                     <strong>Chú ý:</strong> chỉ đăng bình luận/cảm nhận game, gửi lời cảm ơn, các ý kiến nói chung... ở đây.
                     Các thắc mắc về các vấn đề cài đặt, lỗi game... vui lòng chuyển qua phần
                     <a href="javascript:;" id="js_issueLink">Hỗ trợ kỹ thuật</a>.
                  </p>
                  <div class="permission-required">Để gửi bình luận, bạn cần <a href="{{route('login')}}" rel="nofollow">đăng nhập</a></div>
                  <div class="media comment-posting">
                     <div class="media-body">
                        <div class="form-group">
                           <textarea id="js_commentInput" class="form-control js_input-gameComment" name="content" rows="2" placeholder="Bình luận của bạn... Chỉ chấp nhận tiếng Việt CÓ DẤU!" data-autoresize="" disabled="disabled" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 54px;"></textarea>
                        </div>
                        <div class="clearfix">
                           <div class="pull-right">
                              <button class="btn btn-primary btn-xs" disabled="disabled">
                              Gửi
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
               <div class="js_commentContainer js_comments">
                  <div class="clearfix">
                     <div class="pull-left js_pagination">
                     </div>
                  </div>
                  <br>
                  <div id="box-comment" data="{{$game->id}}" data-url="{{route('loadcomment')}}">
                     @foreach ($comment as $com)
                     <div class="general-comments small-scrollbar" data-quote-url="#">
                        <div id="comment-251640" data-ts="1599060337" data-type="gameComment" data-item="" class="media js_commentRow      new">
                           <div class="media-body">
                              <div class="media-heading">
                                 <h5 class="author">
                                    <span class="online_indicator online" data-online="" data-uid="2948531"></span>
                                    <a href="#" rel="nofollow" data-profile="2948531" class="js_author">{{$com->name}}</a>
                                 </h5>
                                 <span style="margin-left: 10px;font-size: 10px;">{{date("d/m/Y",strtotime($com->created_at))}}</span>
                              </div>
                              <div class="content">
                                 <div class="js_content" data-content-id="251640">
                                    {{$com->content}}
                                 </div>
                              </div>
                              <div class="comment-links clearfix">
                                 <button type="submit" id="{{$com->id}}" data="{{$com->game_id}}" data-url="{{route('xoacomment')}}" name="dbtn" class="dbtn btn btn-danger p-1" style="margin-left: 10px;font-size: 12px;" >Xóa</button>         
                              </div>
                           </div>
                        </div>
                        {{-- <div class="row" >{{$comment->links()}}</div>
                        <hr>
                     </div> --}}
                     @endforeach
                  </div>
                  <br>
               </div>
            </div>
            <div id="js_issueTab" role="tabpanel" class="tab-pane">
               <div class="js_commentContainer js_issues">
                  <div class="general-comments small-scrollbar" data-quote-url="#">
                  </div>
                  <br>
               </div>
               <br>
            </div>
            <div role="tabpanel" class="tab-pane" id="js_ratingTab"></div>
         </div>
      </div>
   </div>
   @endif
</div>
@endsection
