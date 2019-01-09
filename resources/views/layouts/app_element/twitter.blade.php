<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@CuisineDeGeek">
{{--<meta name="twitter:creator" content="@individual_account">--}}
<meta name="twitter:url" content="{{url()->current()}}">
<meta name="twitter:title"
      content="@hasSection('titrepage')@yield('titrepage') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif">
<meta name="twitter:description"
      content="@hasSection('description')@yield('description') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif">
<meta name="twitter:image"
      content="@hasSection('image_og')@yield('image_og')@else{{ config('app.name', 'Laravel') }}@endif">