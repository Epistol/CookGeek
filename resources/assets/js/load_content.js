$(document).ready(function() {
	$("body").toasty();

	var easter_egg = new Konami(function() {
		$("body").toasty('pop');
	});

	if(localStorage.getItem('nightmode')) {
		document.body.classList.add('nightmode');
		document.documentElement.classList.add('nightmode');
	}
});