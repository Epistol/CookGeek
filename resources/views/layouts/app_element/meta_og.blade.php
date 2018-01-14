<meta property="og:image" content="@hasSection('image_og')@yield('image_og') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif">
<meta property="og:image:width" content="500">
<meta property="og:image:height" content="500">
<meta property="og:title" content=" @hasSection('titrepage')@yield('titrepage') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif">
<meta property="og:description" content=" @hasSection('description')@yield('description') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif">
<meta property="og:url" content="{{url()->current()}}">