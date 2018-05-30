$( "#app" ).scroll(function() {
    $( "#log" ).append( "<div>Handler for .scroll() called.</div>" );
});



(document).on("scroll", function(){
    if
    ($(document).scrollTop() > 100){
        $(".navbar").addClass("sticky");
    }
    else
    {
        $(".navbar").removeClass("sticky");
    }
});