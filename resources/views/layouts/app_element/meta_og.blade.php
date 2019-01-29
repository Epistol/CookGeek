<meta name="og:image" content="@if(isset($validPictures))
@if(collect($validPictures->first()->urls)->firstWhere('name', "index")['url'] !== ""){{strip_tags(clean(collect($validPictures->first()->urls)->firstWhere('name', "index")['url']))}}@elseif(collect($validPictures->first()->urls)->firstWhere('name', "normal")['url'] !== "")
{{strip_tags(clean(collect($validPictures->first()->urls)->firstWhere('name', "normal")['url']))}}@endif
@else@php echo asset("img/cdglogo.png")@endphp@endif"/>
@if( Route::currentRouteName() === 'recipe.show')
    <meta property="og:title"
          content="@hasSection('titrepage')Recette de : @yield('titrepage') sur CDG -  @lang('common.site_description')@else @lang('common.site_description')@endif"/>
@else
    <meta property="og:title"
          content="@hasSection('titrepage')@yield('titrepage') - @lang('common.site_description')@else @lang('common.site_description')@endif"/>
@endif
<meta property="og:description"
      content="@hasSection('description')@yield('description') - {{ config('app.name', 'Laravel') }}@else Recette sur {{ config('app.name', 'Laravel') }}@endif"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="{{url()->current()}}"/>
<meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}"/>
<meta property="og:locale" content="fr_FR"/>
<meta name="classification" content="geek recette de cuisine gratuit"/>
<meta name="HandheldFriendly" content="true">
