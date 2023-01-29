@extends('layouts.admin')
@section('title','Products')
@section('content')
    <h1 class="page-title">Products</h1>
    <div class="container">
        <div class="text-end mb-3">
            <a href="{{route('adminpanel.products.create')}}" class="btn btn-primary">+ &nbsp; Create Product</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Products</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Colors</th>
                                    <th>Image</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                  <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        @foreach ($product->colors as $color)
                                            <span class="badge" style="background: {{$color->code}};">{{$color->name}} </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- hada --}}
                                        <a class="kbirou-gallory" href="{{asset('storage/' . $product->image)}}">
                                            <img style="height: 40px" src="{{asset('storage/' . $product->image)}}" alt="">
                                        </a>
                                        {{--  --}}
                                        {{-- <img src="{{asset('storage/' . $product->image)}}" style="height: 40px; "> --}}
                                    
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($product->created_at)->format('d/m/Y')}}</td>
                                    <td>
                                        <div class="d-flex" style="gap: 5px;">
                                        <a href="{{route('adminpanel.products.edit',$product->id)}}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('adminpanel.products.destroy',$product->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        </div>
                                    </td>
                                    
                                </tr>  
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- hada --}}
@section('js_after')
    <script src="{{asset('js/plugin/magnific_popup/jquery.magnific-popup.min.js')}}"></script>
     <script>
        $(document).ready(function() {
        $(document).magnificPopup({
            type:'image',
             delegate: '.kbirou-gallory',
                closeOnContentClick: true, 
                image: { 
                    verticalFit: false 
                  } 
        });
        });
     </script>
@endsection

@section('css_after')
    <link rel="stylesheet" href="{{asset('js/plugin/magnific_popup/magnific-popup.css')}}">
@endsection
{{--  --}}