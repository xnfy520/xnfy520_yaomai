$(function(){

    $("[name=logistics_province]").live('change',function(){
        var v = $(this).val();
        var city = $("#logistics_city");
        city.html("");
        var x_q_list = $("#x_q_list");
        x_q_list.html("");
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
                            $(".xj-faassss").css("display","none");
                            $("#show_logistics").css('display','block');
                            cz();
                            console.log(obj);
                            $("#x_qbj").text(obj[0]['parent']['initiate_price']);
                            $("#x_j").text($("#buy_count").val());
                            $("#x_tj").text($("#p_infos").attr('measure'));
                            for(var i=0; i<obj.length; i++){
                                console.log(obj[i].average_price+' '+($("#p_infos").attr('measure')*1)+' '+($("#buy_count").val()*1)+' '+(obj[i].average_price*($("#p_infos").attr('measure')*1)));
                                console.log(obj[0]['parent']['initiate_price']*1);
                                console.log((obj[i].average_price*$("#p_infos").attr('measure')+(obj[0]['parent']['initiate_price']*1))*($("#buy_count").val()*1)+($("#p_infos").attr('price')*1));
                                var p = (obj[i].average_price*$("#p_infos").attr('measure')+(obj[0]['parent']['initiate_price']*1))*($("#buy_count").val()*1)+($("#p_infos").attr('price')*1);
                                $('<li class="xj-td1">'+obj[i].name+'&nbsp;'+(p)+'元</li>').appendTo(x_q_list);
                            }
                        }else{
                            $(".xj-faassss").css("display","block");
                            $("#show_logistics").css('display','none');
                            cz();
                            city.html("");
                            $('<select name="logistics_city"><option value="0" style="background: #ccc;">--请选择--</option></select>').appendTo(city);
                            var citys = $("[name=logistics_city]");
                            for(var i=0; i<obj.length; i++){
                                $('<option value="'+obj[i].id+'">'+obj[i].name+'</option>').appendTo(citys);
                            }
                        }
                    }else{
                        if(v==1 || v==2 || v==3 || v==4){
                             $.ajax({
                                url: define_app_url+'/Member/return_current',
                                data: {pid:v},
                                type:'POST',
                                success: function(datass){
                                    var objs = JSON.parse(datass);
                                    $(".xj-faassss").css("display","none");
                                    $("#show_logistics").css('display','block');
                                    cz();
                                    console.log(objs);
                                    $("#x_qbj").text(objs['initiate_price']);
                                    $("#x_j").text($("#buy_count").val());
                                    $("#x_tj").text($("#p_infos").attr('measure'));
                                    var p = (objs.average_price*$("#p_infos").attr('measure')+(objs['initiate_price']*1))*($("#buy_count").val()*1)+($("#p_infos").attr('price')*1);
                                        $('<li class="xj-td1">'+objs.name+'&nbsp;'+(p)+'元</li>').appendTo(x_q_list);
                                }
                            });
                        }else{
                            $(".xj-faassss").css("display","block");
                            $("#show_logistics").css('display','none');
                            cz();
                            city.html("");
                        }
                    }
                }
            });
        }
    });

    $("[name=logistics_city]").live('change',function(){
        var v = $(this).val();
        var x_q_list = $("#x_q_list");
        x_q_list.html("");
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
                            console.log(obj[i].average_price+' '+($("#p_infos").attr('measure')*1)+' '+($("#buy_count").val()*1)+' '+(obj[i].average_price*($("#p_infos").attr('measure')*1)));
                            console.log(obj[0]['parent']['initiate_price']*1);
                            console.log((obj[i].average_price*$("#p_infos").attr('measure')+(obj[0]['parent']['initiate_price']*1))*($("#buy_count").val()*1)+($("#p_infos").attr('price')*1));
                            var p = (obj[i].average_price*$("#p_infos").attr('measure')+(obj[0]['parent']['initiate_price']*1))*($("#buy_count").val()*1)+($("#p_infos").attr('price')*1);
                            $('<li class="xj-td1">'+obj[i].name+'&nbsp;'+(p)+'元</li>').appendTo(x_q_list);
                        }

                       $(".xj-faassss").css("display","none");
                        $("#show_logistics").css('display','block');
                        cz();
                    }else{
                        // $("#show_logistics").css('display','none');
                        // $(".xj-faassss").css("display","block");
                        // cz();
                      $.ajax({
                            url: define_app_url+'/Member/return_current',
                            data: {pid:v},
                            type:'POST',
                            success: function(datass){
                                var objs = JSON.parse(datass);
                                $(".xj-faassss").css("display","none");
                                $("#show_logistics").css('display','block');
                                cz();
                                console.log(objs);
                                $("#x_qbj").text(objs['initiate_price']);
                                $("#x_j").text($("#buy_count").val());
                                $("#x_tj").text($("#p_infos").attr('measure'));
                                var p = (objs.average_price*$("#p_infos").attr('measure')+(objs['initiate_price']*1))*($("#buy_count").val()*1)+($("#p_infos").attr('price')*1);
                                    $('<li class="xj-td1">'+objs.name+'&nbsp;'+(p)+'元</li>').appendTo(x_q_list);
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




