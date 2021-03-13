<!DOCTYPE html>
<html>
    @include('page.head')
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <style>
            body {
                font-family: sans-serif;
            }

            .indicator.online {
                background: #28B62C;
                display: inline-block;
                width: 1em;
                height: 1em;
                border-radius: 50%;
                -webkit-animation: pulse-animation 2s infinite linear;
            }

            @-webkit-keyframes pulse-animation {
            0% { -webkit-transform: scale(1); }
            25% { -webkit-transform: scale(1); }
                50% { -webkit-transform: scale(1.2) }
                75% { -webkit-transform: scale(1); }
                100% { -webkit-transform: scale(1); }
            }

            .indicator.offline {
                background: #FF4136;
                display: inline-block;
                width: 1em;
                height: 1em;
                
            }
            img {
                border-radius: 50%;
            }
            .modal {
                display: none; /* mặc định được ẩn đi */
                position: fixed; /* vị trí cố định */
                z-index: 1; /* Ưu tiên hiển thị trên cùng */
            }
        </style>
    </head>
    <body>
        @include('page.nar')
        @if(auth::user()->id)
        <div class="tab-pane">
            <div class="">
                    <div class="text-center">
                       <a href="#" class="js_avatar">
                        <img src="{{asset('imag/'.$tt->image)}}" width="180px" height="200px" alt="{{$tt->name}}">
                            </a>                 
                    </div>
                    
                    <div class="user-info">
                        
                        <h1 class="text-center">{{$tt->name}}</h1>
                                    
                        <div class="row">
                            <div class="col-6" align="center">
                                <p>
                                    <label class="control-label">Bạn đang đăng nhập bằng tài khoản:</label>                   
                                    @if($tt->level == 9)
                                      <a style="line-height:10px">Admin</a>
                                    
                                    @else
                                        <a style="line-height:10px;">Thành Viên</a>
                                    
                                    @endif
                                </p>
                                <p>
                                    <strong>Email:</strong> {{$tt->email}}
                                </p>                              
                                <p>
                                    <strong>Ngày sinh:</strong> {{date("d/m/Y",strtotime($tt->birthday)) }}
                                </p>
                                <p>
                                    <strong>Giới tính:</strong>
                                    @if( $tt->gender == 1)
                                        Nam
                                        @else
                                        Nữ
                                        @endif
                                </p>
                                <p>
                                    <span class="indicator online"></span> Online
                                    </p>
                                <p>
                                    <strong>Tham gia:</strong> {{$tt->created_at}}
                                    </p>
                                   <p>
                                    Tài khoản của bạn hiện có <strong>{{$tt->money}}</strong>.
                                </p>
                                   
                                    <p class="text-center" style="margin: 20px 0"><a  data-link-ajax="" class="btn btn-primary" data-toggle="modal" id="myBtn">Nạp tiền vào tài khoản</a></p>
                                    <div class="modal" role="dialog" aria-hidden="true" id="myModal" aria-labelledby="45bddeb3-61b8-4501-96d9-213add956cdd_title" tabindex="-1" style="z-index: 1050; display: block;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="bootstrap-dialog-header">
                                                        <div class="bootstrap-dialog-close-button"><button class="close">×</button></div>
                                                        <div class="bootstrap-dialog-title" id="45bddeb3-61b8-4501-96d9-213add956cdd_title">Nạp tiền qua thẻ cào</div>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="bootstrap-dialog-body">
                                                        <div class="bootstrap-dialog-message">
                                                            <div id="d-1988085937">
                                                                <p>
                                                                    Dùng thẻ cào điện thoại hoặc thẻ Gate để nạp tiền
                                                                    <span class="small text-muted">(thẻ mới, chưa sử dụng để nạp tiền cho điện thoại hoặc dịch vụ khác)</span>
                                                                </p>
                                                                <p class="text-danger">
                                                                    Chú ý: Thẻ Viettel &amp; Vinaphone chỉ nhận mệnh giá từ 50.000 đ trở lên
                                                                </p>
                                                                <hr>
                                                                <form method="post" action="/donate/submitCard" class="form-horizontal card-form" id="fd-1988085937">
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Loại thẻ:</label>
                                                                        <div class="col-sm-9">
                                                                            <div class="row card-type">
                                                                                <label class="col-xs-3 text-center" title="Viettel">
                                                                                <img src="//taigame.org/static/v9/images/card_viettel.png" alt="Viettel"><br>
                                                                                <input type="radio" name="type" value="vtt" required="">
                                                                                </label>
                                                                                <label class="col-xs-3 text-center" title="Mobifone">
                                                                                <img src="//taigame.org/static/v9/images/card_mobifone.png" alt="Mobifone"><br>
                                                                                <input type="radio" name="type" value="vms" required="">
                                                                                </label>
                                                                                <label class="col-xs-3 text-center" title="Vinaphone">
                                                                                <img src="//taigame.org/static/v9/images/card_vinaphone.png" alt="Vinaphone"><br>
                                                                                <input type="radio" name="type" value="vnp" required="">
                                                                                </label>
                                                                                <label class="col-xs-3 text-center" title="Gate">
                                                                                <img src="//taigame.org/static/v9/images/card_gate.png" alt="Gate"><br>
                                                                                <input type="radio" name="type" value="gate" required="">
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label">Mệnh giá thẻ:</label>
                                                                            <div class="col-sm-6">
                                                                                <select name="value" class="form-control" required="">
                                                                                    <option value="">- Chọn mệnh giá -</option>
                                                                                    <option value="10000">10.000</option>
                                                                                    <option value="20000">20.000</option>
                                                                                    <option value="30000">30.000</option>
                                                                                    <option value="50000">50.000</option>
                                                                                    <option value="100000">100.000</option>
                                                                                    <option value="200000">200.000</option>
                                                                                    <option value="300000">300.000</option>
                                                                                    <option value="500000">500.000</option>
                                                                                </select>
                                                                                <div class="text-danger" style="margin-top: 5px">Chọn sai mệnh giá có thể mất thẻ!</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label">Mã thẻ:</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" name="number" class="form-control" placeholder="(cào lớp tráng bạc)" autocomplete="off" required="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label">Số sêri:</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" name="serial" class="form-control" placeholder="(in trên thẻ)" autocomplete="off" required="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-offset-3 col-sm-9">
                                                                                <button type="submit" class="btn btn-primary">Nạp tiền</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <div class="text-right small">
                                                                    Có mã Giftcode? <a href="https://taigame.org/coupon/redeem">Nhập tại đây</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                            </div>
                           
                    
                    </div>
                </div> 
            </div>
        </div>  
        @else 
        <div class="text-center">
            <a href="#" class="js_avatar">
             <img src="{{asset('imag/'.$tt->image)}}" width="180px" height="200px" alt="{{$tt->name}}">
                 </a>                 
         </div>
         
         <div class="user-info">
             
             <h1 class="text-center">{{$tt->name}}</h1>
                         
             <div class="row">
                 <div class="col-6" align="center">
                     <p>
                         <strong>Email:</strong> {{$tt->email}}
                     </p>                              
                     <p>
                         <strong>Ngày sinh:</strong> {{date("d/m/Y",strtotime($tt->birthday)) }}
                     </p>
                     <p>
                         <strong>Giới tính:</strong>
                         @if( $tt->gender == 1)
                             Nam
                             @else
                             Nữ
                             @endif
                     </p>
                     <p>
                         <span class="indicator online"></span> Online
                         </p>
                     <p>
                         <strong>Tham gia:</strong> {{$tt->created_at}}
                         </p>
        @endif                
        <script>
                // lấy phần Modal
                var modal = document.getElementById('myModal');
              
                // Lấy phần button mở Modal
                var btn = document.getElementById("myBtn");
              
                // Lấy phần span đóng Modal
                var span = document.getElementsByClassName("close")[0];
              
                // Khi button được click thi mở Modal
                btn.onclick = function() {
                    modal.style.display = "block";
                }
              
                // Khi span được click thì đóng Modal
                span.onclick = function() {
                    modal.style.display = "none";
                }
              
                // Khi click ngoài Modal thì đóng Modal
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
@include('page.foot')
@include('page.footer')
</body>

</html>