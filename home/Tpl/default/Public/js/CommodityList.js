$(function(){

	$("#shop-buy").click(function(){
        var commodity_id = $("[name=commodity]").val();
        var quantity = $("[name=quantity]").val();
        console.log(commodity_id);
        console.log(quantity);
        if(define_userid==''){
            $.jBox.info('请先登录再购买', '', { top: '35%', buttons: { '马上登录': 'ok' , '关闭':'no' }, submit: function (v, h, f) {
                if(v=='ok'){
                    window.location=define_app_url+'/Index/login';
                }else{
                    return true;
                }
             } });
        }else{
            jBox.tip("正在处理...", 'loading');
            window.setTimeout(function () {
                $.ajax({
                    url: define_app_url+'/Commodity/ajax_buy_commodity',
                    data:{commodity_id:commodity_id,quantity:quantity},
                    type:'POST',
                    success: function(data){
                        var msg = JSON.parse(data);
                        if(msg.status==1){
                            window.location=define_app_url+'/Cart';
                         //   jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {  }});
                        }else{
                            jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { }});
                        }
                    }
                });
            },500);
        }
    });

	$("#shop-add-cart").click(function(){
        var commodity_id = $("[name=commodity]").val();
        var quantity = $("[name=quantity]").val();
        console.log(commodity_id);
        console.log(quantity);
        if(define_userid==''){
            $.jBox.info('请先登录再购买', '', { top: '35%', buttons: { '马上登录': 'ok' , '关闭':'no' }, submit: function (v, h, f) {
                if(v=='ok'){
                    window.location=define_app_url+'/Index/login';
                }else{
                    return true;
                }
            } });
        }else{
            jBox.tip("正在处理...", 'loading');
            window.setTimeout(function () {
                $.ajax({
                    url: define_app_url+'/Commodity/ajax_commodity_add_cart',
                    data:{commodity_id:commodity_id,quantity:quantity},
                    type:'POST',
                    success: function(data){
                        var msg = JSON.parse(data);
                        if(msg.status==1){
                            $("#header_carts").text(msg.data);
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {  }});
                        }else{
                            jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { }});
                        }
                    }
                });
            },500);
        }
    });

   

});