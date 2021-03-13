@extends('master')
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
<div class="col-sm-8 main-col">
    <h1>{{$title}} ({{count($gamecate)}})</h1>
    <div style="display: none">
        {{
            $count = $gamecate->count()

        }}
    </div>
    @if ($gamecate->count() == 0)
            <h1 class="text-center text-danger">Không tìm Thấy game Phù Hợp</h1>
        @else

    {{-- <div class="listing ">
        <div class="responsive">
            <div class="col-xs-6">
              <a target="_blank" href="{{route('infor',['id'=>$item->id])}}" title="{{$item->name}}">
                <img src="{{asset('/imag/'.$item->image)}}" alt="{{$item->name}}" >
                <h6 class="game">{{$item->name}}</h6>
              </a>
           </div>
           
          </div>
    </div> --}}
    <div class="row listing ">
      @foreach ($gamecate as $item)
        <div class="col-xs-6 gallery responsive ">
          <a target="_blank" href="{{route('infor',['id'=>$item->id])}}" title="{{$item->name}}">
            <img src="{{asset('/imag/'.$item->image)}}" alt="{{$item->name}}" >
            <h6 class="game desc">{{$item->name}}</h6>
          </a>
         
       </div>
       @endforeach
   </div>
   <div class="text-right">
       {{$gamecate->links()}}
    </ul>
 </div>

    @endif
    
</div>
@endsection