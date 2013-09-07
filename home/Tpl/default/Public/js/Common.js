$(function(){

    $("[name=logistics_province]").live('change',function(){
        var v = $(this).val();
        var city = $("#logistics_city");
        city.html("");
        var x_q_list = $("#x_q_list");
        var x_q_b_list = $("#x_q_b_list");
        x_q_list.html("");
        x_q_b_list.html("");
        if(v==0){
            $(".xj-faassss").css("display","block");
            $("#show_logistics").css('display','none');
            cz();
            city.html("");
        }else{
            $.ajax({
                url: define_app_url+'/Member/return_provinces',
                data: {pid:v},
                type:'POST',
                success: function(datas){
                    var obj = JSON.parse(datas);
                    if(obj.length>0){
                        if(v==1 || v==2 || v==3 || v==4){
                            console.log('?');
                            $(".xj-faassss").css("display","none");
                            $("#show_logistics").css('display','block');
                            $("#x_j").text($("#buy_count").val());
                            $("#x_tj").text($("#p_infos").attr('measure'));
                            for(var i=0; i<obj.length; i++){
                                var p = (obj[i].average_price*$("#p_infos").attr('measure'));
                                $('<li class="xj-td1">'+obj[i].name+'&nbsp;'+(p)+'元</li>').appendTo(x_q_list);
                            }
                            var ss = 0;
                            for(var s=0; s<obj.length; s++){
                                console.log(obj[s]);
                                if(obj[s].dropin==1){
                                    ss++;
                                    var sk = obj[s].dropin_average_price*$("#p_infos").attr('measure');
                                    if(sk<obj[s].dropin_lowest_price){
                                        sk = obj[s].dropin_lowest_price;
                                    }
                                    var k = (obj[s].average_price*$("#p_infos").attr('measure')+sk*1);
                                    $('<li class="xj-td1">'+obj[s].name+'&nbsp;'+(k)+'元</li>').appendTo(x_q_b_list);
                                }
                            }
                            if(ss<=0){
                                $('<li style="margin-top:10px">该地区暂不支持送货上门，需要联系第三方配送服务商请联系客服</li>').appendTo(x_q_b_list);
                            }
                            cz();
                        }else{
                            $(".xj-faassss").css("display","block");
                            $("#show_logistics").css('display','none');
                            city.html("");
                            $('<select name="logistics_city"><option value="0" style="background: #ccc;">--请选择--</option></select>').appendTo(city);
                            var citys = $("[name=logistics_city]");
                            for(var i=0; i<obj.length; i++){
                                $('<option value="'+obj[i].id+'">'+obj[i].name+'</option>').appendTo(citys);
                            }
                            cz();
                        }
                    }else{
                        if(v==1 || v==2 || v==3 || v==4){
                            console.log('ha');
                             $.ajax({
                                url: define_app_url+'/Member/return_current',
                                data: {pid:v},
                                type:'POST',
                                success: function(datass){
                                    var objs = JSON.parse(datass);
                                    $(".xj-faassss").css("display","none");
                                    $("#show_logistics").css('display','block');
                                    $("#x_qbj").text(objs['initiate_price']);
                                    $("#x_j").text($("#buy_count").val());
                                    $("#x_tj").text($("#p_infos").attr('measure'));
                                    var p = (objs.average_price*$("#p_infos").attr('measure'));
                                    $('<li class="xj-td1">'+objs.name+'&nbsp;'+(p)+'元</li>').appendTo(x_q_list);
                                    if(objs.dropin==1){
                                        var sk = objs.dropin_average_price*$("#p_infos").attr('measure');
                                        if(sk<objs.dropin_lowest_price){
                                            sk = objs.dropin_lowest_price;
                                        }
                                        var k = (objs.average_price*$("#p_infos").attr('measure')+sk*1);
                                        $('<li class="xj-td1">'+objs.name+'&nbsp;'+(k)+'元</li>').appendTo(x_q_b_list);
                                    }else{
                                        $('<li style="margin-top:10px">该地区暂不支持送货上门，需要联系第三方配送服务商请联系客服</li>').appendTo(x_q_b_list);
                                    }
                                    cz();
                                }
                            });
                        }else{
                            $(".xj-faassss").css("display","block");
                            $("#show_logistics").css('display','none');
                            city.html("");
                            cz();
                        }
                    }
                }
            });
        }
    });

    $("[name=logistics_city]").live('change',function(){
        var v = $(this).val();
        var x_q_list = $("#x_q_list");
        var x_q_b_list = $("#x_q_b_list");
        x_q_list.html("");
        x_q_b_list.html("");
        if(v==0){
            $("#show_logistics").css('display','none');
            $(".xj-faassss").css("display","block");
            cz();
        }else{
            $.ajax({
                url: define_app_url+'/Member/return_provinces',
                data: {pid:v},
                type:'POST',
                success: function(datas){
                    var obj = JSON.parse(datas);
                    if(obj.length>0){
                        console.log(obj);
                        $("#x_qbj").text(obj[0]['parent']['initiate_price']);
                        $("#x_j").text($("#buy_count").val());
                        $("#x_tj").text($("#p_infos").attr('measure'));
                        for(var i=0; i<obj.length; i++){
                            var p = (obj[i].average_price*$("#p_infos").attr('measure'));
                            $('<li class="xj-td1">'+obj[i].name+'&nbsp;'+(p)+'元</li>').appendTo(x_q_list);
                        }
                        var ss = 0;
                        for(var s=0; s<obj.length; s++){
                            console.log(obj[s]);
                            if(obj[s].dropin==1){
                                ss++;
                                var sk = obj[s].dropin_average_price*$("#p_infos").attr('measure');
                                if(sk<obj[s].dropin_lowest_price){
                                    sk = obj[s].dropin_lowest_price;
                                }
                                var k = (obj[s].average_price*$("#p_infos").attr('measure')+sk*1);
                                $('<li class="xj-td1">'+obj[s].name+'&nbsp;'+(k)+'元</li>').appendTo(x_q_b_list);
                            }
                        }
                        if(ss<=0){
                            $('<li style="margin-top:10px">该地区暂不支持送货上门，需要联系第三方配送服务商请联系客服</li>').appendTo(x_q_b_list);
                        }
                        $(".xj-faassss").css("display","none");
                        $("#show_logistics").css('display','block');
                        cz();
                    }else{
                      $.ajax({
                            url: define_app_url+'/Member/return_current',
                            data: {pid:v},
                            type:'POST',
                            success: function(datass){
                                var objs = JSON.parse(datass);
                                $(".xj-faassss").css("display","none");
                                $("#show_logistics").css('display','block');
                                console.log(objs);
                                $("#x_qbj").text(objs['initiate_price']);
                                $("#x_j").text($("#buy_count").val());
                                $("#x_tj").text($("#p_infos").attr('measure'));
                                var p = (objs.average_price*$("#p_infos").attr('measure'));
                                $('<li class="xj-td1">'+objs.name+'&nbsp;'+(p)+'元</li>').appendTo(x_q_list);
                                if(objs.dropin==1){
                                    var sk = objs.dropin_average_price*$("#p_infos").attr('measure');
                                    if(sk<objs.dropin_lowest_price){
                                        sk = objs.dropin_lowest_price;
                                    }
                                    var k = (objs.average_price*$("#p_infos").attr('measure')+sk*1);
                                    $('<li class="xj-td1">'+objs.name+'&nbsp;'+(k)+'元</li>').appendTo(x_q_b_list);
                                }else{
                                    $('<li style="margin-top:10px">该地区暂不支持送货上门，需要联系第三方配送服务商请联系客服</li>').appendTo(x_q_b_list);
                                }
                                cz();
                            }
                        });
                    }
                }
            });
        }
    });

function cz(){
    var sm=($(window).height()-$("#xj-tanchu1").height())/2;
    var zm=($(window).width()-$("#xj-tanchu1").width())/2;
    $("#xj-tanchu1").css({"left":zm,"top":sm});
    for(var i=1;i<$(".xm-banner dl dd").length;i++){
        $(".xm-banner dl dd").eq(i).animate({opacity:0},{queue:false,duration:550});
    }
}
    $("#click_captcha").click(function(){
        this.src=this.src;
    });

    $("#switch_captcha").click(function(){
        $("#click_captcha").trigger('click');
    });

    $("#insertcode").keyup(function(){
        if(this.value!=this.value.toUpperCase()){
            this.value=this.value.toUpperCase();
        }
    });

    $("#search_all_product").submit(function(){
		var keys = $(this).find("#search_key").val();
		if(keys!=''){
			window.location = define_app_url+'/Commodity/search/search_key/'+keys;
		}
    });

    var cache = {};
    $( "#search_key" ).autocomplete({
        minLength: 2,
        source: function( request, response ) {
            var term = request.term;
            if ( term in cache ) {
                response( cache[ term ] );
                return;
            }
            $.getJSON( define_app_url+'/Common/autocomplete', request, function( data, status, xhr ) {
                cache[ term ] = data;
                response( data );
            });
        },
        select: function( event, ui ) {
            return false;
        }
    }).data( "autocomplete" )._renderItem = function( ul, item ) {
        if(item.label.length>30){
            return $( "<li title='"+item.label+"'>" ).data( "item.autocomplete", item ).append( "<a href='"+define_app_url+"/Commodity/details/id/"+item.product_id+".html'>" + item.label.substr(0,25)+'...'+"</a>" ).appendTo( ul );
        }else{
            return $( "<li title='"+item.label+"'>" ).data( "item.autocomplete", item ).append( "<a href='"+define_app_url+"/Commodity/details/id/"+item.product_id+".html'>" + item.label+"</a>" ).appendTo( ul);
        }
    };


});




