@extends('layouts.app.app')

@section('content')
    <div id="myShop">
        <a href="https://shop.spreadshirt.fr/cuisine-de-geek">cuisine-de-geek</a>
    </div>

    <script>
        var spread_shop_config = {
            shopName: 'cuisine-de-geek',
            locale: 'fr_FR',
            prefix: 'https://shop.spreadshirt.fr',
            baseId: 'myShop'
        };
    </script>

    <script type="text/javascript" src="https://shop.spreadshirt.net/js/shopclient.nocache.js"></script>

@endsection
