<!DOCTYPE html>
<html>
<head>
    @include('cpadmin.blocks.head')
    <script src="{{asset('cpadmin/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('cpadmin/ckfinder/ckfinder.js')}}"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
       @include('cpadmin.blocks.navbar')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
       @include('cpadmin.blocks.aside')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
          @include('cpadmin.blocks.header')
            <!-- Main content -->
            <section class="content">
              @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('cpadmin.blocks.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('cpadmin.blocks.foot')
</body>
</html>