<script async defer src="https://cdn.headwayapp.co/widget.js" ></script>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=IntersectionObserver" defer async></script>
<div id="fb-root"></div>
<script src="https://kit.fontawesome.com/6af8152230.js"></script>

<script  async defer  type="application/javascript">
    // @see https://docs.headwayapp.co/widget for more configuration options.
    var HW_config = {
        selector: "#updates", // CSS selector where to inject the badge
        account: "J05Ovy"
    };
</script>
<script src="{{ asset('js/konami.js') }}"></script>
@if(Route::is('auth.login') || Route::is('page.contact') )
<script src='https://www.google.com/recaptcha/api.js?render=6Le3UV0UAAAAAC7lpn-K7fr5gxI2qjNUe4Kf3tAU'></script>
@endif
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.3&appId=107304179368120&autoLogAppEvents=1">
</script>
@include("layouts.app.parts.tartecitron")
{{--@include("layouts.js.pwa")--}}

{{--
<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/service-worker.js');
        });
    }
</script>--}}
