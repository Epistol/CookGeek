$(document).ready(function(){
    $(document).scroll(function(){
        var st = $(this).scrollTop();
        if(st > 50) {
            // TODO : check that
            // $("nav.navbar").addClass('sticky');
        } else {
            // $("nav.navbar").removeClass('sticky');
        }
    });
});
