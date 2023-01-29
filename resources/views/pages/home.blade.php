@extends('layouts.master')
@section('title','HomePage')
@section('content')
<main class="homepage">
    @include('pages.components.home.header')
    {{-- @auth
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn btn-primary">logout</button>
        </form> 
    @endauth --}}
    <section class="products-section">
        <div class="container">
            <h1 class="section-title">Feature products</h1>
            <div class="products-row">
                
                @foreach ($products as $product)
                    <x-product-box :product="$product"/>
                @endforeach

            </div>
        </div>
    </section>
    
</main>
@endsection