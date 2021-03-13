
$(document).ready(function (){
    // var iframe = document.getElementById("myFrame");
    // var elmnt = iframe.contentWindow.document.getElementsByTagName("H1")[0];
    $('.noneactive').first().addClass('active');
    $('#pagi').each(function() {
        $($(this)).on('click', 'li', function(e){
            e.preventDefault();
            $(this).addClass('active').siblings().removeClass('active');
        });
        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    setInterval(function(){
        var gameid = $('#box-comment').attr('data');
        var url = $('#box-comment').data('url');
        if (gameid !== undefined|| url !== undefined) {
            $.ajax({
                url: url,
                method:'POST',
                data:{game_id:gameid },
                success: function(result){
                    //console.log("run");
                     $('#box-comment').html(result);
                }
            })
        } else {
            
        }
        
    },3000000);
    $("#formaddchat").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
    
        var form = $(this);
        var url = form.attr('action');
        
        $.ajax({
               method: "POST",
               url: url,
               data: form.serialize(), // serializes the form's elements.
               success: function(result){
                $('#contenttext').val('');
                $('#box-comment').html(result);
                }
             });
    
        
    });
 
    $(document).on('click','button[name="dbtn"]', function(){
        var num = $(this).attr('id');
        var gameid = $(this).attr('data');
        var url = $(this).data('url');
       console.log(url + num + gameid);
        $.ajax({
            url: url,
            method:'POST',
            data:{idcm:num , game_id:gameid},
            success: function(result){
               
                 $('#box-comment').html(result);
            }
        })
        
    });
    $("select[name='admin-comment']").change(function (){
        var game_id = $(this).val();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method:'POST',
            data:{game_id:game_id}, 
            dataType: 'html',          
            success: function(result){          
                $('#admin-boxcomment').html(result);
                
            }
        })
    });
    $(document).on('click','button[name="admin-xoacomment"]', function(){
        var num = $(this).attr('id');
        var gameid = $(this).attr('data');
        var url = $(this).data('url');
        console.log(gameid+"//"+url + num);
        alert(123);
        $.ajax({
            url: url,
            method:'POST',
            data:{id:num , game_id:gameid},
            success: function(result){           
                 $('#admin-boxcomment').html(result);
            }
        })
        
    });
    $(document).on('click','#link', function(e){
        e.preventDefault()
        var moneyid = $('#data').data('id');
        var url = $('#data').data('url');
        var gid = $(this).attr('game');
        $.ajax({
            url: url,
            method:'POST',
            data:{id:moneyid , gameid:gid },
            success: function(result){
                $('#tree-block').html(result);
            }
        })
        
    });
});