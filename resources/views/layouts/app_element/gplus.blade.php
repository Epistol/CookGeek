<meta itemprop="name" content="@hasSection('titrepage')@yield('titrepage') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif" />
@if( Route::currentRouteName() === 'recipe.show')
    <meta itemprop="description" content="@hasSection('titrepage')Recette de : @yield('titrepage') - sur {{ config('app.name', 'Laravel') }}. @lang('common.site_description') @else{{ config('app.name', 'Laravel') }}@endif">
@else
    <meta itemprop="description" content="@hasSection('titrepage')@yield('titrepage') - sur {{ config('app.name', 'Laravel') }}@else @lang('common.site_description') - {{ config('app.name', 'Laravel') }} @endif">
@endif
<meta itemprop="image" content="@hasSection('image_og')@yield('image_og')@else{{ config('app.name', 'Laravel') }}@endif" />