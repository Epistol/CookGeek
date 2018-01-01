@extends('layouts.app')


@section('content')

    <div class="container">
        <section class="section blockcontent">
        <h1 class="title">{{$page->name}}</h1>


        {!!$page->content!!}

        </section>



    </div>

@endsection
