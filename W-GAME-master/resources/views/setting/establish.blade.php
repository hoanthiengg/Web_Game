<!DOCTYPE html>
<html>
    @include('page.head')
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>
        @include('page.nar')
<div class="container">
    <form method="post" action="{{route('setting.edit',['id' => $item->id])}}" enctype="multipart/form-data" class="form-horizontal row">
        @csrf
            <h3 align="center"> Thiết Lập </h3>
        
        <div class="form-group">
            <label for="image" class="col-sm-offset-1 col-sm-3 control-label">Ảnh Đại Diện</label>
            <div class="col-sm-5" class="form-control">
            <input type="file" name="image" required>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-offset-1 col-sm-3 control-label">{{ __('name') }}</label>
            <div class="col-sm-5"><input id="name" type="text" name="name" value="{{$item->name}}" class="form-control"></div>
        </div> 
        <div class="form-group">
            <label class="col-sm-offset-1 col-sm-3 control-label">Giới tính</label>
            <div class="col-sm-5">
                <select name="gender" class="form-control">
                    <option value="">--</option>
                    <option value="1" {{ ($item->gender ==1) ?'checked' : '' }} selected="selected">Nam</option>
                    <option value="0" {{ ($item->gender ==0) ?'checked' : '' }}>Nữ</option>
                </select>
            </div>
        </div>                       
        <div class="form-group">
            <label class="col-sm-offset-1 col-sm-3 control-label" for="datepicker">Ngày Sinh</label>
            <div class="col-sm-5">
                {{-- <input type="text" name="birthday" id="regdate" value="{{ old('birthday', date('d/m/Y')) }}"> --}}
                <input type="date" name="birthday" class="form-control" id="regdate">
            </div>
            {{-- <input type="text" id="datepicker" value="{{ old('birthday', date('d/m/Y')) }}" name="birthday" id="datepicker" class="form-control"></div> --}}
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-5"><button class="btn btn-primary">Cập nhật</button></div>
        </div>
    </form>
</div>
</div>

@include('page.foot')
@include('page.footer')
</body>
{{-- <script>
    $(function(){
      $("#regdate").datepicker({
    //   dateFormat: 'dd-mm-yy',
    //   changeMonth: true,
    //   changeYear: true,
      showAnim: 'slideDown'
      });
  });
  </script> --}}
</html>