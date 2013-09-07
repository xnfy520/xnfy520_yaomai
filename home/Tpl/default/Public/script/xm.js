$(".xm-ddleft div").first().css("border-top","none")
/*-----------------*/

$(".xm-ds").click(function(){
	$(".xm-ds1").css("display","block");
	$(".xm-df1").css("display","none");	
})

$(".xm-df").click(function(){
	$(".xm-df1").css("display","block");
	$(".xm-ds1").css("display","none");	
})

/*-----------------*/

$("#xj-cel a").click(function(){
	$("#xj-der").toggle();
})

$("#close").click(function(){
	$("#mid-new").slideUp(300);	
})

function auto(){
	var zn=setInterval(function(){
		var one=$("#new div").eq(0);
		one.remove();
		$("#new").append(one);
	},5000);
}

auto();

/*-----------------*/
function next(a){
	var b=-980*a;
	$(".xm-banner-dh").animate({marginLeft:b},{queue:false,duration:550});
}
var n=0
var m=$("#banner ul li").length-1;
function shang(){
	if(n!=0){
		n--;
		next(n);
	}else{
		n=m;
		next(m);
	}	
}
function xia(){
	if(n!=m){
		n++;
		next(n);
	}else{
		n=0
		next(n);
	}
}
var t=setInterval(function(){
	if(n!=m){
		n++;
		next(n);
	}else{
		n=0;
		next(n);
	}
},4000);
$(".banner-shang").click(function(){
	shang();
	clearInterval(t);
	t=setInterval(function(){
		if(n!=m){
			n++;
			next(n);
		}else{
			n=0;
			next(n);
		}
	},4000);
});
$(".banner-xia").click(function(){
	xia();
	clearInterval(t);
	t=setInterval(function(){
		if(n!=m){
			n++;
			next(n);
		}else{
			n=0;
			next(n);
		}
	},4000);
});