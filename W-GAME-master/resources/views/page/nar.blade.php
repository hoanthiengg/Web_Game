<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<style>
    .navbar-brand{
        margin-bottom: 0;
    }
</style>
<div class="background-top">
    <div class="background-bottom">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="" data-virtual-container>
                <div class="container">
                    <div class="navbar-header" >
                        
                    <a class="navbar-brand" href="{{route('/')}}">
                            {{-- <h2>W-GAME</h2> --}}
                            <img src="{{asset('images/logo.png')}}" alt="" width="50px" height="40px">
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button> 
                    </div>
                    
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="language hidden-sm">
                                <p class="navbar-text">
                                    <img src="//taigame.org/static/v9/images/vi.gif" title="Tiếng Việt" alt="Tiếng Việt" />
                                </p>
                            </li>
                            <li><a href="#">Game PC</a></li>
                            <li class="dropdown">
                                @if ( Auth::check())
                                <a href="#" class="dropdown-toggle fa fa-bars fa-lg" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                                <ul class="dropdown-menu" role="menu">
                                
                                         <li class="dropdown open">
                                            
                                             <li>
                                                <a href="{{ route('setting.profile',['id'=>Auth::User()->id]) }}">
                                                {{Auth::User()->name}} &nbsp; <img src="{{asset('/imag/'.Auth::User()->image)}}" alt="{{Auth::User()->name}}" class="avatar" alt="avatar" style="background-image:url('{{Auth::User()->image}}');">
                                                </a>
                                             </li>                                             
                                                <li><a href="{{ route('setting.establish',['id'=>Auth::User()->id]) }}"><i class="fa fa-gear"></i> Thiết lập cá nhân</a></li>
                                                <li><a href="{{ route('setting.profile',['id'=>Auth::User()->id]) }}"><i class="fa fa-info-circle"></i> Thông tin tài khoản</a></li>
                                                <li><a href="{{ route('setting.account',['id'=>Auth::User()->id]) }}"><i class="fa fa-user"></i> Thông tin đăng nhập</a></li>
                                                <li class="divider"></li>
                                                    <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i>
                                                {{ __('Logout') }}
                                                </a>
                                                </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                            </form>
                                            @else
                                            <li><a href="{{route('login')}}" ><i class="fas fa-sign-in-alt"></i> &nbsp; Đăng nhập</a></li>
                                            <li><a href="{{route('register')}}" rel="nofollow"><i class="fa fa-edit"></i> &nbsp; Đăng ký</a></li>
                                            @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
     <div class="" data-virtual-container>
         <div class="general-page container">
            <div class="row index-page">    
{{-- <script type="text/javascript">
$('#btnAddProfile').bind('click',function(){
        $(this).attr('class','dropdown-toggle fa fa-bars fa-lg').text('');
})
</script> --}}