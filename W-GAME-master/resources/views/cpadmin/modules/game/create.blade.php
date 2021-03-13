@extends('cpadmin.master')
@section('title',' Thêm Danh sách')
  @section('content')
      
  @if (count($errors) > 0)
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

  <!-- Default box -->
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thêm danh sách</h3>
                <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('admin.game.store')}}" enctype="multipart/form-data">
            @csrf
               <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('name') }}</label>
                            <div class="col-md-10">
                            <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}" required >
                            </div>
                        </div>

                <div class="form-group row">
                            
                    <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('thể loại') }}</label>
                    <div class="col-md-10">
                        <div class="row">
                            @foreach ($list as $item)
                            <div class="col-md-3">
                                <input  class="ml-md-2 " type="checkbox" id="autoSizingCheck{{$item->name}}" name="category[]" value="{{$item->name}}">
                                <label class="form-check-label ml-md-2" for="autoSizingCheck{{$item->name}}">{{ str_replace('-',' ',$item->name)}}</label>
                            </div>
                            @endforeach
                            
                        </div>
                    
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-md-2 col-form-label text-md-left">{{ __('image') }}</label>
                    <div class="col-md-10">
                        <input type="file" name="image" value="{{old('image')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="producer" class="col-md-2 col-form-label text-md-left">{{ __('Nhà Sản Xuất') }}</label>
                    <div class="col-md-10">
                    <input id="producer" type="text" class="form-control" name = "producer" value="{{ old('producer')}}" required >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publisher" class="col-md-2 col-form-label text-md-left">{{ __('Nhà Phát Hành') }}</label>
                    <div class="col-md-10">
                    <input id="publisher" type="text" class="form-control"name = "publisher" value="{{ old('publisher')}}" required >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="year" class="col-md-2 col-form-label text-md-left">{{ __('Năm Phát Hành') }}</label>
                    <div class="col-md-10">
                        <input type="number" name="year" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value='2020' min="2000" max="2040">
                        <p class="text-muted">Only Number from 2000 to 2040</p>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="Capacity" class="col-md-2 col-form-label text-md-left">{{ __('Dung Lượng') }}</label>
                    <div class="col-md-10">
                    <input id="Capacity" type="text" class="form-control"name = "Capacity" value="{{ old('Capacity')}}" required >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="configuration" class="col-md-2 col-form-label text-md-left">{{ __('Cấu Hình Tối Thiểu') }}</label>
                    <div class="col-md-10">
                        <textarea name="configuration" id="configuration" cols="80" rows="5" value="{{old('configuration')}}"  required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="link" class="col-md-2 col-form-label text-md-left">{{ __('Link') }}</label>
                    <div class="col-md-10">
                        <input id="link" type="text" class="form-control"name = "link" value="{{ old('link')}}" required >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label text-md-left">{{ __('description') }}</label>
                    <div class="col-md-10">
                    <textarea name="description" id="description" cols="80" rows="5" value="{{old('description')}}"  required></textarea>
                    <script>
                    //    CKEDITOR.replace( 'description');
                            var editor = CKEDITOR.replace( 'description' );
                                CKFinder.setupCKEditor( editor );
                      </script>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-6">
                        {{-- <input type="submit" class="btn btn-primary" name='submitImage' value="Upload Image"/> --}}
                        {{-- <button type="submit" class="btn btn-primary" >
                            {{ __('submit') }}
                        </button> --}}
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
        </form>
        </div>
    </div>
</div>
{{-- <script type="text/javascript">



    $("#uploadFile").change(function(){
  
    //    $('#image_preview').html("");
  
       var total_file=document.getElementById("uploadFile").files.length;
  
       for(var i=0;i<total_file;i++)
  
    //    {
  
    //     $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
  
       }
  
    });
  
  
  
    // $('form').ajaxForm(function() 
  
    //  {
  
    //   alert("Uploaded SuccessFully");
  
    //  }); 
  
  
  
  </script> --}}
@endsection