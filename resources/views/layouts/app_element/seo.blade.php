@if( Route::currentRouteName() === 'recipe.show')
    <meta property="og:title"
          content="@hasSection('titrepage')Recette de : @yield('titrepage') sur CDG -  @lang('common.site_description')@else @lang('common.site_description')@endif"/>
@else
    <meta property="og:title"
          content="@hasSection('titrepage')@yield('titrepage') - @lang('common.site_description')@else @lang('common.site_description')@endif"/>
@endif
{{--OG DESCRIPTION--}}
<meta property="og:description"
      content="@hasSection('description')@yield('description') - {{ config('app.name', 'Laravel') }}@else Recette sur {{ config('app.name', 'Laravel') }}@endif"/>

{{--OG TYPE WEBSITE--}}
@if( Route::currentRouteName() === 'home' || Route::currentRouteName() === 'user.show')
    <meta property="og:type" content="profile"/>
@else
    <meta property="og:type" content="website"/>
@endif
<meta property="og:url" content="{{url()->current()}}"/>
<meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}"/>
<meta property="og:locale" content="fr_FR"/>
<meta name="classification" content="@if(isset($recipe)){{$recipe->getAvgNote()}}@endif"/>
<meta name="HandheldFriendly" content="true">
<meta name="p:domain_verify" content="05cbfbe372355fc341420d5bcf35e1cd"/>
<meta name="google-signin-client_id" content="825660079681-k0qvih3gdn02d7h5qbves79m9vf2ctag.apps.googleusercontent.com">
<meta name="og:image" content="@if(isset($ogimage)){{$ogimage}}@endif"/>


