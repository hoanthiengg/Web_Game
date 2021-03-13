@extends('master')
@section('title','Game mới được đăng')
@section('content')
<style>
   
   div.gallery {
      width: 170px;
      height: 150px;
      float: left;
      margin-right: 5px;
      
    }
    div.gallery img {
      width: 100%;
      height: auto;
      border-radius: 5px 10px 4px 8px;
    }

    div.desc {
      padding: 15px;
      text-align: center;
    }
   </style>
<div class="col-sm-8">
    <h1>Game mới được đăng ({{count($allgame)}})</h1>
    <br>
    <div class="row listing responsive">
      @foreach ($allgame as $item)
      <div class="col-xs-6 gallery">
           <a target="_blank" href="{{route('infor',['id'=>$item->id])}}" title="{{$item->name}}">
            <img src="{{asset('/imag/'.$item->image)}}" alt="{{$item->name}}" >
            <h6 class="game">{{$item->name}}</h6>
          </a>
       </div>
       @endforeach
      <div class="row">{{$allgame->links()}}</div>
    </div>
 </div>
 {{-- <div class="row listing responsive">
   <div class="col-xs-6 gallery">
     <a target="_blank" href="{{route('infor',['id'=>$item->id])}}" title="{{$item->name}}">
       <img src="{{asset('/imag/'.$item->image)}}" alt="{{$item->name}}" >
       <h6 class="game">{{$item->name}}</h6>
     </a>
  </div>
</div> --}}
 @endsection
 