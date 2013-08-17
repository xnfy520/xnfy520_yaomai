$(function(){

    $("#Evaluate-add-edit [title]").live('hover',function(){
        $(this).tooltip({
            position: "center right",
            offset: [-2, 10],
            effect: "fade",
            opacity: 0.7
        });
    });

    $(".jbox-title").live('mouseover',function(){
        $(".tooltip").fadeOut();
    });

    //修改数据
    $(".xnfy520-function-index-edit").live('click',function(){
        var value = $(this).parents("tr").find(".xnfy520-function-index-table-check-this").val();
        if(value!='' && !isNaN(value)){
            var edit_submit = function (v, h, f) {
                if (v == 'ok') {
                    jBox.tip("正在处理...", 'loading');
                    $.ajax({
                        url: define_app_url+'/Evaluate/ajaxedit',
                        data: f,
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                jBox.close();
                                jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                            }else{
                                jBox.tip(msg.info, 'error',{ timeout: 1000});
                            }
                        }
                    });
                    return false;
                }
            };

            jBox("get:"+define_app_url+"/Evaluate/edit/id/"+value,{
                width:420,
                title: '',
                top: '10%',
                draggable: true,
                opacity: 0.01,
                persistent: true,
                showIcon: false,
                showSpeed: 'slow',
                bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
                buttons: { '修改': 'ok','取消':'cancel'},
                loaded: function (h) {
                    if($("[name=id]").val()==''){
                        jBox.close();
                        jBox.tip('程序异常', 'error',{ timeout: 1000});
                    }
                },
                submit:edit_submit
            });
        }else{
            jBox.tip('程序异常', 'error',{ timeout: 1000});
        }

    });

    //AJAX删除
    $("[name=Evaluate-del]").live('submit',function(){
        var data = $(this).serializeArray();
        if(data==''){
            jBox.tip("请选择要删除的数据！", 'error',{timeout: 1000});
        }else{
            var submit = function (v, h, f) {
                if (v == 'ok'){
                    jBox.tip("正在处理...", 'loading');
                    $("[type=submit]").attr('disabled','disabled');
                    window.setTimeout(function () {
                        $.ajax({
                            url: define_app_url+'/Evaluate/ajaxdel',
                            data: data,
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                                }else{
                                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[type=submit]").removeAttr('disabled'); }});
                                }
                            }
                        });
                    },500);
                }
                return true; //close
            };
            jBox.confirm("确认删除这些数据？", "提示", submit,{top: '40%'});
        }

    });




});