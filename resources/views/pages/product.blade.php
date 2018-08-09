@extends ('layouts.app')


@section('breadcrumb')

<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
        </ol>
</nav>
@endsection

@section('sidebar')
<div class= "col-sm-2">
    <div class = "products categories">
            <ul class ="category" style ="list-style-type: none;">
            @foreach($categories as $category)
                <li><a href="{{route('shop.index', ['category' =>$category->slug])}}">{{$category->name}}</a></li>
            @endforeach
            </ul>
    </div>
</div>
@endsection

@section('content')
<div class= "col-sm-10">
    <div class="product-section container">
        <div class= "product-section-image">
                <div class="row">
                    <div class="col-sm-4 photo">
                        <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                    </div>
                    <div class="col-sm-6 product-section-information">
                        <h1 class="product-seciton-title">{{$product->name}}</h1>
                        <div class="product-seciton-subtitle">{{$product->details}}</div>
                        <div class="product-seciton-description"><p> {{$product->description}}</p></div>
                        <p>&nbsp;</p>
                        <div class="product-seciton-price">{{$product->price}}</div>
                        <form action="{{route('cart.store')}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="price" value="{{$product->price}}">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    <div>
                    {{-- This is the thid column 2 --}}
                </div>
    
                
        </div>

    </div>
</div>

{{-- You Might Also LIKE --}}
<div class="row">
        <div class="row">
            <div class="col-md-9">
                <h3> You might also like..</h3>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-primary" href="#carousel-example-generic"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-primary" href="#carousel-example-generic"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        @foreach ($mightAlsoLike as $likeproduct)
                        <div class="col-sm-4">     
                            <div class="col-item">
                                <div class="photo">
                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5><a href = "{{route('shop.show', $likeproduct->slug)}}">
                                                {{$likeproduct->name}}</h5></a>
                                            <h5 class="price-text-color">
                                                {{$likeproduct->price}}</h5>
                                        </div>
                                        {{-- <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                    </div> --}}
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>    
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                            @foreach ($mightAlsoLike as $likeproduct)
                            <div class="col-sm-4">     
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-6">
                                                <h5><a href = "{{route('shop.show', $likeproduct->slug)}}">
                                                    {{$likeproduct->name}}</h5></a>
                                                <h5 class="price-text-color">
                                                    {{$likeproduct->price}}</h5>
                                            </div>
                                            <div class="rating hidden-sm col-md-6">
                                                <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                </i><i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        {{-- <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                            <p class="btn-details">
                                                <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                        </div> --}}
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 