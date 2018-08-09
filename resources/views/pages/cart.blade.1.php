@extends ('layouts.app')


@section('content')

<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
</nav>


@if(Cart::count() > 0)
        <h2>{{Cart::count()}} item(s) in Shopping Cart</h2>
@else
        <h2>No items in Cart</h2>
@endif
<div class="might-like-grid">
    <h2>You might also like..</h2>
        @foreach ($mightAlsoLike as $product)
        <div class="products">
            <a href="{{route('shop.show', $product->slug)}}"><img src="/img.png" alt="{{$product->slug}}"></a>
            <a href="{{route('shop.show', $product->slug)}}"><div class="product-name">{{$product->name}}</div></a>
            <div class="product-price">{{$product->price}}</div>
        </div>
        @endforeach
</div>
@endsection