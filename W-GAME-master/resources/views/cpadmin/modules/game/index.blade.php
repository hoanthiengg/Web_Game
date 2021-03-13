@extends('cpadmin.master')
@section('title','Danh sách')
    

  @section('content')
      

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm Danh sách </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <table id="example1" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th> 
            <th>category</th>
            <th>Image</th>
            <th>producer</th>
            <th>Publisher</th>
            <th>year</th>
            <th>Capacity</th>
            <th>Link</th>
            <th>configuration</th>
            <th>description</th>
            <th>Created_at</th>
            <th>Delete</th>
            <th>Eidt</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($games as $game )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$game->name}}</td>
            <td>{{$game->category}}</td>
            <td><img src="{{asset('imag/'.$game->image)}}" width="180px" height="250px" alt=""></td>
            <td>{{$game->producer}}</td>
            <td>{{$game->publisher}}</td>
            <td>{{$game->year}}</td>
            <td>{{$game->Capacity}}</td>
            <td>{{$game->link}}</td>
            <td>{{$game->configuration}}</td>
            <td>{!!$game->description!!}</td>
            <td>{{date("d/m/Y - h:i:s",strtotime($game->created_at)) }}</td>
            <td><a href="{{route('admin.game.destroy',['id' =>$game->id])}}" onclick="return acceptdelete('bạn có muốn xoá không ?')" type="button" class="btn btn-warning">Delete</a></td>  
            <td><a href="{{route('admin.game.edit',['id' =>$game->id])}}" type="button" class="btn btn-primary" >Edit</a></td>
        </tr>
        @endforeach
</table>
<a href="{{Route('admin.game.create')}}" class="btn btn-primary"  title="Create new Game">Thêm Game</a>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer">
        Footer
    </div> --}}
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection