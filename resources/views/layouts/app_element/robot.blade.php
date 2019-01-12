@if( Route::currentRouteName() === 'recipe.show')
    <meta name="description" content="@hasSection('titrepage')Recette de : @yield('titrepage') - sur {{ config('app.name', 'Laravel') }}. @lang('common.site_description') @else{{ config('app.name', 'Laravel') }}@endif">
@else
    <meta name="description" content="@hasSection('titrepage')@yield('titrepage') - sur {{ config('app.name', 'Laravel') }}@else @lang('common.site_description') - {{ config('app.name', 'Laravel') }} @endif">
@endif

<meta name="robots" content="index,follow"/>
<meta name="googlebot" content="index,follow"/>
<meta name="generator" content="CDG"/>
<meta name="subject" content="@hasSection('titrepage')@yield('titrepage') - @lang('common.site_description')  @else @lang('common.site_description') - {{ config('app.name', 'Laravel') }}@endif"/>
<meta name="rating" content="@hasSection('rating')@yield('rating')@endif"/>