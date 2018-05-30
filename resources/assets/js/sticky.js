
$(document).ready(function(){
    $(document).scroll(function(){
        var st = $(this).scrollTop();
        if(st > 50) {
            $("nav.navbar").addClass('sticky');
        } else {
            $("nav.navbar").removeClass('sticky');
        }
    });
});
