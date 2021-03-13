           <div class="game-section row">
                @foreach ($Search as $game)
                <div class="col-sm-4 col-xs-6">
                <a href="{{route('infor',['id'=>$game->id])}}" title="{{$game->name}}">
                <img src="{{asset('/imag/'.$game->image)}}" alt="{{$game->name}}" style="background-image:url('{{$game->image}}')"/>
                <h6>{{$game->name}}</h6>
                    </a>
                </div>
                @endforeach
            </div>
