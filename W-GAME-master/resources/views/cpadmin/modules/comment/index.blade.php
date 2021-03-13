@extends('cpadmin.master')
@section('title','List Game')
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách</h3>
            <div class="card-tools">
                {{-- <a href="{{Route('admin.flim.create')}}" class="btn btn-primary"  title="Create new Category">ADD MORE</a> --}}
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="form-group row">
            <label for="game" class="col-md-2 col-form-label text-center">GAME</label>
            <div class="col-md-10">
                <select name="admin-comment" class="form-control" data-url="{{route('admin.comment.showcomment')}}">
                    <option value="">Vui lòng chọn game</option>
                    @foreach ($game as $g)
                    <option value="{{$g->id}}">{{$g->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body" >
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                   <tr>
                      <th>ID</th>
                      <th>Content</th>
                      <th>User ID</th>
                      <th>created_at</th>
                      <th>Delete</th>
                   </tr>
                </thead>
                <tbody id="admin-boxcomment" >
                    <td>Bạn chưa chọn game</td>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Content</th>
                        <th>User ID</th>
                        <th>created_at</th>
                        <th>Delete</th>
                     </tr>
                </tfoot>
             </table>
        </div>
        
        <!-- /.card-body -->
        
    </div>
    <!-- /.card -->
</section>
@endsection