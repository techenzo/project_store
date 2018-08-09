@extends ('layouts.app')


@section('content')

<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
</nav>
<div class = "products categories">
    <ul class ="category" style ="list-style-type: none;">
    @foreach($categories as $category)
    <li><a href="{{route('shop.index', ['category' =>$category->slug])}}">{{$category->name}}</a></li>
    @endforeach
    </ul>

</div>

<div class="products text=center">
    @foreach ($products as $product)
    <div class="products">
            <a href="#"><img src="/img.png" alt="{{$product->slug}}"></a>
        <a href="#"><div class="product-name">{{$product->name}}</div></a>
        <div class="product-price">{{$product->price}}</div>
    </div>
    @endforeach
</div>
@endsection