@if( Route::currentRouteName() === 'recipe.show')
    <meta name="description"
          content="@hasSection('titrepage')Recette de : @yield('titrepage') - sur {{ config('app.name', 'Laravel') }}. @lang('common.site_description') @else{{ config('app.name', 'Laravel') }}@endif">
@else
    <meta name="description"
          content="@hasSection('titrepage')@yield('titrepage') - sur {{ config('app.name', 'Laravel') }}@else @lang('common.site_description') - {{ config('app.name', 'Laravel') }} @endif">
@endif

<meta name="robots" content="index,follow"/>
<meta name="googlebot" content="index,follow"/>
<meta name="generator" content="CDG"/>
<meta name="subject"
      content="@hasSection('titrepage')@yield('titrepage') - @lang('common.site_description')  @else @lang('common.site_description') - {{ config('app.name', 'Laravel') }}@endif"/>
<meta name="rating" content="@hasSection('rating')@yield('rating')@endif"/>
<meta name="msvalidate.01" content="D8DFFDCD3C366B8964767CA91DDEEA82"/>
<meta name="keywords"
      content="CuisineDeGeek,cuisine,recettes,cuisine,recette,recettes de cuisine,geek
      @if( Route::currentRouteName() === 'recipe.show')
        @if(isset($univers))
            @if(count($univers) == 1)
              ,{{ strip_tags(clean($univers->name))}}
            @endif
        @endif
      @else
        @if(isset($univers))
            @if(isset($univers->name))
              ,{{ strip_tags(clean($univers->name))}}
        @endif
      @endif

      @endif

      @hasSection('titrepage'),@yield('titrepage')@endif">