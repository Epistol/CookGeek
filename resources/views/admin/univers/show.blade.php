@extends('layouts.app.app')
@section('titrepage', $page->name)

@section('content')

    <div class="container">
        <section class="section blockcontent">
            @include("admin.page.bread")

            <h1 class="title">{{strip_tags($page->name)}}</h1>

            {!!$page->content!!}

        </section>


    </div>

@endsection
