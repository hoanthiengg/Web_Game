@extends('cpadmin.master')
@section('title','Sửa Danh sách')
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
  <form method="POST" action="{{route('admin.game.update',['id' => $game->id])}} " enctype="multipart/form-data">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sửa danh sách</h3>
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
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
             <div class="form-group row">
                          <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('name') }}</label>
                          <div class="col-md-10">
                          <input id="name" type="text" class="form-control" name="name" value="{{$game->name}}" required >
                          </div>
                      </div>

              <div class="form-group row">
                  <label for="game" class="col-md-2 col-form-label text-md-left">{{ __('thể loại') }}</label>
                        <div class="col-md-10">
                            <div class="row">
                                @foreach ($list as $item)
                        
                                <div class="col-md-3">

                                    @if (strpos("str ".$game->category,$item->name ) != false)
                                        <input class="ml-md-2" type="checkbox" id="autoSizingCheck" name="category[]" value="{{$item->name}}" checked>
                                    @else
                                        <input class="ml-md-2" type="checkbox" id="autoSizingCheck" name="category[]" value="{{$item->name}}" >
                                    @endif
                                    
                                    <label class="form-check-label ml-md-2" for="autoSizingCheck">{{ str_replace('-',' ',$item->name)}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
              <div class="form-group row">
                  <label for="image" class="col-md-2 col-form-label text-md-left">{{ __('image') }}</label>
                  <div class="col-md-10">
                      <input type="file" name="image" value="{{$game->image}}" required>
                  </div>
              </div>
              <div class="form-group row">
                <label for="producer" class="col-md-2 col-form-label text-md-left">{{ __('Nhà Sản Xuất') }}</label>
                <div class="col-md-10">
                <input id="producer" type="text" class="form-control" name = "producer" value="{{$game->producer}}" required >
                </div>
            </div>
            <div class="form-group row">
                <label for="publisher" class="col-md-2 col-form-label text-md-left">{{ __('Nhà Phát Hành') }}</label>
                <div class="col-md-10">
                <input id="publisher" type="text" class="form-control"name = "publisher" value="{{$game->publisher}}" required >
                </div>
            </div>
              <div class="form-group row">
                  <label for="year" class="col-md-2 col-form-label text-md-left">{{ __('năm phát hành') }}</label>
                  <div class="col-md-10">
                      <input type="number" name="year" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$game->year}}" min="2000" max="2040">
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
                  <textarea name="description" id="description" cols="80" rows="5" placeholder="{{$game->description}}" value="{{ old('description')}}" required></textarea>
                      <script>
                              var editor = CKEDITOR.replace( 'description' );
                                CKFinder.setupCKEditor( editor );
                      </script>
                  </div>
              </div>
              <div class="form-group row mb-0">
                  <div class="col-md-10 offset-md-6">
                      <button type="submit" class="btn btn-primary">
                          {{ __('EDIT') }}
                      </button>
                  </div>
              </div>
            </form>
          </div>
      </div>
    </div>
</div>
</div>
</div>
{{-- <script>
    CKEDITOR.replace( 'description',
{
   filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
   filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
   filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
   filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
   filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
   filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
</script> --}}
@endsection