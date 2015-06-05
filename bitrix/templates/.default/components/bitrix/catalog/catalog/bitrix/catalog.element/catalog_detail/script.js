$(document).ready(function(){
    $('.b-product-photo__list').bxSlider({
        pagerCustom: '.b-product-photo__thumbnail',
        controls: false,
        useCSS: false,
        mode: 'fade'
    });
});
$(document).ready(function(){
    $(".slide_panel").click(function(){
        $(this).toggleClass("show");
        var slide_block = $(this).siblings(".slide_block");

        if ($(this).hasClass("show")){
            slide_block.slideDown("1000");
        }
        else{
            slide_block.slideUp("1000");
        }
    });
})