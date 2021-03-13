@extends('cpadmin.master')
@section('title','Index')
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Description</th>
                     <th>created_at</th>
                     <th>EDIT</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                   @foreach ($categories as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ str_replace('-',' ',$item->name)}}</td>
                        <td>{{$item->description}}</td>
                        <td> {{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td>
                        <td><a href="{{Route('admin.category.edit',['id'=>$item->id])}}">EDIT</a></td>
                        <td><a href="{{Route('admin.category.destroy',['id'=>$item->id])}}" onclick="return checkdelete('Are You Sure delete this category ?')">DELETE</a></td>
                    </tr>         
                    @endforeach    
               </tbody>
            </table>
            <a href="{{Route('admin.category.create')}}" class="btn btn-primary"  title="Create new Category">Thêm Category</a>
         </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
@endsection