<!-- SCRIPTS  -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "url": "{{url()->current()}}",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{{route('search.post')}}?{q}",
    "query-input": "required name=q"
  }
}
</script>

<script>
    var toast_png = "{{ asset('js/toasty/toasty.png')}}";
    var toast_mp3 = "{{ asset('js/toasty/toasty.mp3')}}";
</script>
@if(Route::currentRouteNamed('recipe.edit'))
    <script src="{{ asset('js/recipeEdit.js') }}"></script>
@else
    <script src="{{ asset('js/app.js') }}"></script>
@endif


@include('layouts.app_element.scripts')
