<style>
    .po{
         margin-bottom: 10px;
        width: 100%;
        height: auto;
        font-family:  Arial, Helvetica, sans-serif ;
    }
    .menu{
        width: 80%;
        height: auto;
        margin-bottom: 0px
    }
</style>
<script>
    $(document).ready(function(){
    
     $('#country_name').keyup(function(){ 
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('searchgame') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#countryList').fadeIn();  
                        $('#countryList').html(data);
              }
             });
            }
        });
        $(document).on('click', 'li', function(){  
            $('#countryList').fadeOut(); 
            $('#country_name').val($(this).text());  
            
        });
    });
    </script>

    
    
  
<div class="col-sm-4 general-sidebar">
    <div class="panel panel-red filter-block">
        <div class="panel-heading"><h3 class="panel-title">Tìm Kiếm</h3></div>
        <div class="panel-body">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-search"></i>
              </button>
              <div class="dropdown-menu menu">
                <form method="POST" id="form-search" action="{{ route('searchgame')}}">
                    @csrf
                                <input type="text" name="country_name" id="country_name" class="form-control input-lg po" placeholder="Tìm:game theo tên" />
                                    <div id="countryList">
                            </div>
                </form>
              </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Thể loại game</h3>
        </div>
        <ul class="categories-block list-categories list-group row small">
            @foreach ($listcategory  as $item)
                <li class="col-md-6 list-group-item">
                    <i class="fas fa-arrow-alt-circle-right"></i>
                        <a href="{{Route('pagecategory',['name' => $item->name])}} "> {{str_replace('-',' ',$item->name)}}</a>
                    </li>    
            @endforeach
        </ul>
    </div>
{{--   
    <div class="panel panel-success tagcloud">
        <div class="panel-heading">
            <h3 class="panel-title">Xem game theo Tag</h3>
        </div>
        <div class="display-links">
            <a href="javascript:;" class="js_alphabetTag" data-alt="Thứ tự ABC &darr;">Thứ tự ABC &uarr;</a>
            <a href="javascript:;" class="js_weighTtag" data-alt="Số lượng game &uarr;">Số lượng game &darr;</a>
        </div>
        <ul class="js_tagCloud">
            <li class="tag1" data-slug="danh-dam">
                <a href="https://taigame.org/tag/danh-dam" title="131 game">
                   aaaaaa
                </a>
            </li>
            <li class="tag2" data-slug="danh-dam">
                <a href="https://taigame.org/tag/danh-dam" title="131 game">
                   aaabbbbbbb
                </a>
            </li>
        </ul>

    </div> --}}
    {{-- <div class="fb-page" data-href="https://www.facebook.com/taigame.org.website" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
        <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/taigame.org.website"><a href="https://www.facebook.com/taigame.org.website">Taigame.org</a></blockquote>
        </div>
    </div> --}}
</div>
</div>
{{-- <div class="sidebar-share">
    <div class="fb-like" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true" style="margin-bottom:10px"></div>
</div> --}}
</div>
</div>