<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@CuisineDeGeek" />
{{--<meta name="twitter:creator" content="@individual_account">--}}
<meta name="twitter:url" content="{{url()->current()}}" />
<meta name="twitter:title" content="@hasSection('titrepage')@yield('titrepage') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif" />
@if( Route::currentRouteName() === 'recipe.show')
    <meta name="twitter:description" content="@hasSection('titrepage')Recette de : @yield('titrepage') - sur {{ config('app.name', 'Laravel') }}. @lang('common.site_description') @else{{ config('app.name', 'Laravel') }}@endif">
@else
    <meta name="twitter:description" content="@hasSection('titrepage')@yield('titrepage') - sur {{ config('app.name', 'Laravel') }}@else @lang('common.site_description') - {{ config('app.name', 'Laravel') }} @endif">
@endif
<meta name="twitter:image" content="@if(isset($ogimage)){{$ogimage}}@endif" />
