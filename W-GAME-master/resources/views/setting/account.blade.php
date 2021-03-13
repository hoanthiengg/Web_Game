<!DOCTYPE html>
<html>
    @include('page.head')
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>
        @include('page.nar')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" width="900px">
                        <h2 class="card-header" align="center">Thay đổi mật khẩu</h2>
    
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form class="form-horizontal" method="POST" action="{{ route('setting.changePassword') }}">
                                {{ csrf_field() }}
    
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="new-password" class="col-md-4 control-label">Mật khẩu hiện tại</label>
    
                                    <div class="col-md-6">
                                        <input id="current-password" type="password" class="form-control" name="current-password" required>
    
                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <label for="new-password" class="col-md-4 control-label">Mật khẩu mới</label>
    
                                    <div class="col-md-6">
                                        <input id="new-password" type="password" class="form-control" name="new-password" required>
    
                                        @if ($errors->has('new-password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('new-password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label for="new-password-confirm" class="col-md-4 control-label">Nhập lại mật khẩu mới</label>
    
                                    <div class="col-md-6">
                                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Thay đổi mật khẩu
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('page.foot')
        @include('page.footer')
    </body>
    
</html>