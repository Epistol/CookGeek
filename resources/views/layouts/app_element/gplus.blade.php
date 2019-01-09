<link href="https://plus.google.com/+Cuisinedegeek" rel="publisher">
<meta itemprop="name"
      content="@hasSection('titrepage')@yield('titrepage') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif">
<meta itemprop="description"
      content="@hasSection('description')@yield('description') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif">
<meta itemprop="image"
      content="@hasSection('image_og')@yield('image_og')@else{{ config('app.name', 'Laravel') }}@endif">