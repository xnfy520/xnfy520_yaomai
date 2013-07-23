
$(function(){

    $("#systemset").submit(function(){
        jBox.tip("正在处理...", 'loading');
        $("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        window.setTimeout(function () {
            $.ajax({
                url: define_app_url+'/System/modify_system_configuration',
                data: data,
                type:'POST',
                //	timeout:500,
                beforeSend: function(){
                    //	alert("开始");
                },
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                          //  window.location=define_self_url;
                            $("[type=submit]").removeAttr('disabled');
                        }});
                    }else{
                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[type=submit]").removeAttr('disabled'); }});
                    }
                },
                error: function(){
                    //	alert('请求失败');
                },
                complete: function(){
                    //	alert('结束');
                }
            });
        },500);
    });

});