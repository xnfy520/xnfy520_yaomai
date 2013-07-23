
$(function(){

    $("#click_captcha").click(function(){
        this.src=this.src;
    });

    $("#insert_captcha").keyup(function(){
        if(this.value!=this.value.toUpperCase()){
            this.value=this.value.toUpperCase();
        }
    });

    $("#click_switch_captcha").click(function(){
        $("#click_captcha").trigger('click');
    });

});