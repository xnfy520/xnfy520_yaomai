$(".zj-a").click(function(){
	var djg=$(".zj-a").index(this);
	var dqsl=$(".sl-input").eq(djg).val();
	dqsl++;
	$(".sl-input").eq(djg).val(dqsl);
})

$(".js-a").click(function(){
	var djg=$(".js-a").index(this);
	var dqsl=$(".sl-input").eq(djg).val();
	if(dqsl!=0){
		dqsl--;
		$(".sl-input").eq(djg).val(dqsl);
	}else{
		$(".sl-input").eq(djg).val(dqsl);
	}
})
$(".dd-sc").click(function(){
	var dq=$(".dd-sc").index(this);
	$(".xm-wdgwc3").eq(dq).remove();
	if($(".xm-wdgwc3").length<1){
		window.location.href="gwc.html";
	}
})