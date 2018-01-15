$(".main_nav>li").addClass("has_submenu");
$(".main_nav>li>ul").removeClass("sub_menu").addClass("submenu");
$(".main_nav").css('display', 'flex');

$.validator.setDefaults({
    submitHandler: function() {
        alert("submitted!");
    }
});

$().ready(function() {

    $(".lang_item").on("click",function(){
       var href=$(this).attr("href");
       location.href=href;
    });

    var offset=3;
    var count=parseInt( $("#press_count").val() )||0;
    $(".load_more_news").on("click",function(){
        if( count-offset<1 ) return $(".load_more_news").hide();
        $.ajax({
            async:true,
            type:"POST",
            data:{offset:offset},
            url:"/wp-content/themes/template/ajax-news.php",
            success:function(data){
                offset=offset+3;
                data && $(".press_list").append( data );
                if( count-offset<1 ) return $(".load_more_news").hide();
            }
        });
    });



    $("input[name='ff_phone']").mask("7 (999) 999-9999");

    var onValid=function(e,th){
        $(th).closest(".ff_block").find(".ff_err").show();
    }

    $(".feedback_form").validate({
        rules: {
            ff_name: {
                required: true,
                minlength: 3
            },
            ff_phone:{
                required:true,
                minlength: 16,
                maxlength:16
            },
            ff_mail: {
                required: true,
                email: true
            },
            ff_company:{
                required: true,
                minlength: 3
            }
        },
        messages: {
            ff_name: {
                required: onValid,
                minlength: onValid
            },
            ff_phone:{
                required: onValid,
                minlength: onValid,
                maxlength: onValid
            },
           ff_mail: {
                required: onValid,
                email: onValid
            },
            ff_company: {
                required: onValid,
                minlength: onValid
            }
        }
    });

});
$(".ask_sample").on("click",function(){
	$(".header_side .req_a_sample").click()
});

$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});