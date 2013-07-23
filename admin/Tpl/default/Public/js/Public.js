$(function(){

    var form_check ={
        info:'',
        rules:{

            english_name:{//英文名
                rule:'^[a-zA-Z0-9_]+$',
                tip:'必须为字母，数字，或下划线'
            },

            positive_integer:{//正整数
                rule:'^[0-9]+$',
                tip:'必须为数字'
            },

            email:{//电子邮箱
                rule:'^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$',
                tip:'必须为邮箱格式'
            },

            ip:{
                rule:'((?:(?:25[0-5]|2[0-4]\d|[01]?\d?\d)\.){3}(?:25[0-5]|2[0-4]\d|[01]?\d?\d))',
                tip:'必须为IP地地址格式'
            }

        },
        tmp:'',

        check_length: //检测字符串长度
            function(key,value,min,max)
            {
                if(value.length<min || value.length>max){
                    this.info = key+'不能少于'+min+'位，大于'+max+'位';
                    return false;
                }else{
                    this.info = null;
                    return true;
                }
            },

        check_regular_matching:
            function(key,value,regular){
                var reg = new RegExp(this.rules[regular].rule);
                if(!reg.test(value)){
                    this.info = key+this.rules[regular].tip;
                    return false;
                }else{
                    this.info = null;
                    return true;
                }
            }

    };

    $("#clickcode").click(function(){
        this.src=this.src;
    });

    $("#insertcode").keyup(function(){
        if(this.value!=this.value.toUpperCase()){
            this.value=this.value.toUpperCase();
        }
    });



//    $("[title]").live('hover',function(){
//        $(this).tooltip({
//            position: "center right",
//            offset: [-2, 10],
//            effect: "fade",
//            opacity: 0.7
//        });
//    });

    //AJAX管理员登录验证
    $("#ajax_admin_check_login").live('submit',function(){

        var data = $(this).serializeArray();
        var login_name = $("#ajax_admin_check_login [name=login_name]");
        var password = $("#ajax_admin_check_login [name=password]");
        var verify = $("#ajax_admin_check_login [name=verify]");

        closeSubmit("#ajax_admin_check_login");

        if(!form_check.check_length('用户名',login_name.val(),6,20)){
            jBox.tip(form_check.info, 'error',{ timeout: 1000,closed: function () { openSubmit("#ajax_admin_check_login"); }});
            return false;
        }else if(!form_check.check_length('密码',password.val(),6,20)){
            jBox.tip(form_check.info, 'error',{ timeout: 1000,closed: function () { openSubmit("#ajax_admin_check_login"); }});
            return false;
        }else if(!form_check.check_regular_matching('验证码',verify.val(),'positive_integer')){
            jBox.tip(form_check.info, 'error',{ timeout: 1000,closed: function () { openSubmit("#ajax_admin_check_login"); }});
            return false;
        }else{
            jBox.tip("正在处理...", 'loading');
            window.setTimeout(function () {
                $.ajax({
                    url: define_app_url+'/Public/ajax_admin_check_login',
                    data: data,
                    type:'POST',
                    success: function(data){
                        var msg = JSON.parse(data);
                        if(msg.status==1){
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=msg.data }});
                        }else{
                            jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () {$("#clickcode").trigger('click'); openSubmit("#ajax_admin_check_login"); }});
                        }
                    }
                });
            },500);
        }
    });

    function closeSubmit(e){
        $(e).find("[type=submit]").attr('disabled','disabled');
    }

    function openSubmit(e){
        $(e).find("[type=submit]").removeAttr('disabled');
    }

});