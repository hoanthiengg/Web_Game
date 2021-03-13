@extends('master')
@section('title','Trang Admin')
@section('content')
<style>
 .game-section img {
    border-radius: 7px;
    width: 100%;
}

</style>
<div class="col-sm-8">
    <div id="hit-games" class="carousel slide" data-ride="carousel">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $i=0; ?>
            @foreach ($slider as $sl)
            <li data-target="#myCarousel" data-slide-to="{{$i}}" 
            @if( $i == 0 )
            class="active">
            @endif
            </li>
            <?php $i++; ?>
            @endforeach
           
          </ol>
      
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
              <?php $i=0; ?>
            @foreach ($slider as $sl)
            <div 
            @if( $i==0 )
                class="item active"
            @else
                class="item"
            @endif
                >
                <?php $i++ ?>
                <a href="{{route('infor',['id'=>$sl->id])}}" title="{{$sl->name}}">
                <img src="{{asset('/imag/'.$sl->image)}}" alt="{{$sl->name}}" style="background-image:url('{{$sl->image}}'); width:100%;"/>
              </div>
            @endforeach
          </div>
      
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>
    </div>
        <h2 class="game-section-header">Game mới đăng </h2>
            <div class="game-section row">
                @foreach ($GameView as $game)
                <div class="col-sm-4 col-xs-6">
                <a href="{{route('infor',['id'=>$game->id])}}" title="{{$game->name}}">
                <img src="{{asset('/imag/'.$game->image)}}" alt="{{$game->name}}" style="background-image:url('{{$game->image}}')"/>
                    </a>
                </div>
                @endforeach
            </div>
            <h2 class="game-section-header">Mới có update</h2>
            <div class="game-section row">
                @foreach ($Gupdate as $item)
                <div class="col-sm-4 col-xs-6">
                    <a href="{{route('infor',['id'=>$item->id])}}" data-toggle="tooltip" data-placement="top" title="{{$item->updated_at}}">
                    <img src="{{asset('/imag/'.$item->image)}}" alt="{{$item->name}}" style="background-image:url('{{$item->image}}')"/>
                    </a>
                </div>
                @endforeach
            </div>
            <h2 class="game-section-header">Game hot</h2>
            <div class="game-section row">
                @foreach ($topdown as $top)
                <div class="col-sm-4 col-xs-6">
                    <a href="{{route('infor',['id'=>$top->id])}}" title="{{$top->name}}">
                    <img src="{{asset('/imag/'.$top->image)}}" alt="{{$top->name}}" style="background-image:url('{{$top->image}}')"/>
                    </a>
                </div>
                @endforeach
            </div>
            <p class="text-right"><a href="{{route('allgame')}}" class="btn btn-success">Xem thêm »</a></p>
            <div class="well">
                <h4>Giới thiệu</h4>
                <p>Ra đời từ cuối năm 2010, trải qua 10 năm phát triển, taigame.org đã trở thành website chia sẻ game máy tính
                    lớn nhất Việt Nam, với hơn 10000 game đã được đăng, và vẫn tiếp tục tăng thêm mỗi ngày.
                    Tất cả game trên trang web đều là bản đầy đủ (không giới hạn thời gian chơi),
                    và đều được chơi thử rất kỹ trước khi chia sẻ tới thành viên, đảm bảo chơi được và an toàn (không chứa virus).
                    Tất cả các link download đều đảm bảo hoạt động vĩnh viễn, không bao giờ die.
                </p>
                <p>Ngoài sự hỗ trợ của admin, người dùng trên trang web còn nhận được sự hỗ trợ nhiệt tình từ các thành viên khác,
                    trong một cộng đồng thân thiện, qua các công cụ giao tiếp tiện dụng như chat, nhắn tin, diễn đàn, lưu bút...
                    trên một website mà tất cả mọi tính năng đều nhằm phục vụ một mục đích duy nhất: giúp mọi người tải và
                    chơi game một cách dễ dàng nhất!
                </p>
                <p>Chân thành cảm ơn các bạn đã ủng hộ website trong suốt thời gian qua. Đó là động lực lớn nhất để chúng tôi
                    duy trì và phát triển trang web lớn mạnh hơn nữa. Mọi ý kiến, góp ý vui lòng 
                </p>
            </div>
        </div>
@endsection   