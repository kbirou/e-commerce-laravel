@extends('layouts.master')
@section('title','checkout')
@section('head')
<script src="https://js.stripe.com/v3/"></script> 
<script src="{{ asset('js/stripe.js') }}"></script> 
@endsection
@section('content')
<header class="page-header">
    <h1>Checkout</h1>
    <h3 class="cart-amount">${{App\Models\Cart::totalAmount()}}</h3>
</header>

    <main class="checkout-page">
        <div class="container">
            <form action="" class="checkout-form" id="payment-form" method="post">
                @csrf
                <div class="field">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="@error('name') has-error @enderror" placeholder="John Doe" value=" {{old('name') ? old('name') : auth()->user()->name}} ">
                    @error('name')
                        <span class="field-error">{{$message}} </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="@error('email') has-error @enderror" placeholder="JohnDoe@gmail.com" value=" {{old('email') ? old('email') : auth()->user()->email}} ">
                    @error('email')
                        <span class="field-error">{{$message}} </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" class="@error('phone') has-error @enderror" placeholder="John Doe" value=" {{old('phone') ? old('phone') : auth()->user()->phone}} ">
                    @error('phone')
                        <span class="field-error">{{$message}} </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="country">Country</label>
                    <select name="country" id="country">
                        <option value="">-- Select Country --</option>
                        <option value="United States">United States</option>
                    </select>
                    @error('country')
                        <span class="field-error">{{$message}} </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" class="@error('state') has-error @enderror" placeholder="New York" value=" {{old('state') ? old('state') : auth()->user()->state}} ">
                    @error('state')
                        <span class="field-error">{{$message}} </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" class="@error('city') has-error @enderror" placeholder="New York City" value=" {{old('city') ? old('city') : auth()->user()->city}} ">
                    @error('city')
                        <span class="field-error">{{$message}} </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="zip">Zip Code</label>
                    <input type="text" id="zip" name="zip" class="@error('zip') has-error @enderror" placeholder="123456" value=" {{old('zip') ? old('zip') : auth()->user()->zip}} ">
                    @error('zip')
                        <span class="field-error">{{$message}} </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" class="@error('adresse') has-error @enderror" placeholder="Rue 22 New York" value=" {{old('adresse') ? old('adresse') : auth()->user()->adresse}} ">
                    @error('adresse')
                        <span class="field-error">{{$message}} </span>
                    @enderror
                </div>
                <input type="hidden" name="payment_method_id" id="payment_method_id">
                
                
                    <div id="payment-element">
                      <!-- Elements will create form elements here -->
                    </div>
                
                    <button id="submit">Submit</button>
                    <div id="error-message">
                      <!-- Display error message to your customers here -->
                    </div>
                  
            </form>
        </div>
    </main>

@endsection