<meta name="og:image" content="@if(isset($firstimg)) @if($firstimg->first() !== ""){{strip_tags(clean($firstimg->first()))}}@else{{ config('app.name', 'Laravel') }}@endif @else{{ config('app.name', 'Laravel') }} @endif" />
<meta property="og:image:width" content="500" />
<meta property="og:image:height" content="500" />
<meta property="og:title" content="@hasSection('titrepage')@yield('titrepage') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif" />
<meta property="og:description" content="@hasSection('description')@yield('description') - {{ config('app.name', 'Laravel') }}@else Recette sur {{ config('app.name', 'Laravel') }}@endif" />
<meta property="og:type"   content="website" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}" />