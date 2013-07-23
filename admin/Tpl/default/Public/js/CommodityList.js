$(function(){

    $(".into-merchant").live('click',function(){
        var by_user = $(this).attr('by_user');
        $.ajax({
            url: define_app_url+'/User/ajax_into_merchant_setting',
            data: {by_user:by_user},
            type:'POST',
            success: function(data){
                var msg = JSON.parse(data);
                if(msg.status==1){
                    //   jBox.close();
                    //   jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                    window.setTimeout(function () { window.open(define_root_url+'/merchant.php') },1000);
                }else{
                    jBox.tip(msg.info, 'error',{ timeout: 1000});
                }
            }
        });
    });

    $(".into-merchant-commodity").live('click',function(){
        var by_user = $(this).attr('by_user');
        var pid = $(this).attr('pid');
        var cid = $(this).attr('cid');
        var id = $(this).attr('id');
        if(by_user!='' && pid!='' && cid!='' && id!=''){
            $.ajax({
                url: define_app_url+'/User/ajax_into_merchant_setting',
                data: {by_user:by_user},
                type:'POST',
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        //   jBox.close();
                        //   jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                        //     window.setTimeout(function () { window.open(define_root_url+'/merchant.php') },1000);
                        window.setTimeout(function () { window.open(define_root_url+'/merchant.php/CommodityList/edit/pid/'+pid+'/cid/'+cid+'/id/'+id+'') },1000);
                    }else{
                        jBox.tip(msg.info, 'error',{ timeout: 1000});
                    }
                }
            });
        }else{
            jBox.tip('异常操作', 'error',{ timeout: 1000});
        }

    });

});