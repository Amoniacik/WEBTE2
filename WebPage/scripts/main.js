function initialize() {

    $("body").load(function (){
        $("#featured_slide").css("display","block");
    });

    $(".menu-item a").click(function (){
        $("#featured_slide").css("display","none");
    });

}

function showSlide(){
    $("#featured_slide").css("display","block");
}