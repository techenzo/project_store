@extends ('layouts.app')


@section('content')

<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
      </nav>
<div class="products text=center">
    @foreach ($products as $product)
    <div class="products">
            <a href="{{route('shop.show', $product->slug)}}"><img src="/img.png" alt="{{$product->slug}}"></a>
            <a href="shop/{{$product->slug}}"><div class="product-name">{{$product->name}}</div></a>
        <div class="product-price">{{$product->price}}</div>
    </div>
    @endforeach
</div>
@endsection