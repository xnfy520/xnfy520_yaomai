$(".foot .foot1").eq(1).addClass("footbac");

$(".yuding").hover(function(){
	$(".de-yuding").css("display","block");
	$(".de-toupiao").css("display","none");
},function(){
})
	
$(".toupiao").hover(function(){
	$(".de-yuding").css("display","none");
	$(".de-toupiao").css("display","block");
},function(){
})



$(".normalMenu").hover(function(){
	var djg=$(".normalMenu").index(this);
	$(".downMenu").eq(djg).css({"display":"block"});
	$(".normalMenu").eq(djg).addClass("nowMenu").removeClass("normalMenu");
},function(){
	$(".downMenu").css({"display":"none"});
	$(this).removeClass("nowMenu").addClass("normalMenu");
});




$(".downMenu").hover(function(){
	var djg=$(".downMenu").index(this);
	$(".downMenu").eq(djg).css({"display":"block"});
	$(".normalMenu").eq(djg).addClass("nowMenu").removeClass("normalMenu");
},function(){
	$(".downMenu").css({"display":"none"});
	$("#mid-menu > ul > li > a:gt(1)").removeClass("nowMenu").addClass("normalMenu");
});
