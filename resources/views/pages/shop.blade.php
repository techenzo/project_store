@extends ('layouts.app')

@section('breadcrumb')

<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
</nav>
@endsection

@section('sidebar')
<div class= "col-sm-2 sidebar">
    <div class = "products categories sidebar">
            <ul class ="category" style ="list-style-type: none;">
            @foreach($categories as $category)
            <li class ="{{request()->category == $category->slug ? 'active' : ''}}"><a href="{{route('shop.index', ['category' =>$category->slug])}}">{{$category->name}}</a></li>
            {{-- <li class ="{{setActiveCategory($category->slug)}}"><a href="{{route('shop.index', ['category' =>$category->slug])}}">{{$category->name}}</a></li> --}}
            @endforeach
            </ul>
           
    </div>
</div>

@endsection


@section('content')

<div class= "col-sm-10">
    <div class="product-header">
    <h2>{{$categoryName}}</h2>
        <div>   
            <strong>Price :</strong>
            <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'low_high'])}}">Low to High</a> |
            <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'high_low'])}}">High to Low</a>
        </div>
    </div>

    @forelse ($products as $product)
    <div class="col-sm-3">
        <div class="col-item">
            <div class="photo">
                <a href="{{route('shop.show', $product->slug)}}">
                <img src="http://placehold.it/350x260" class="img-responsive" alt="{{$product->slug}}" />
                </a>
            </div>
            <div class="info">
                <div class="row">
                    <div class="price col-md-8">
                        <h5><a href="{{route('shop.show', $product->slug)}}">{{$product->name}}</a></h5>
                    </div>
                    <div class="price col-md-4">
                    <h5 class="price-text-color">{{moneyformat($product->price)}}</h5>
                    </div>    
                </div>
                <div class="row">
                    <div class="price col-md-12">
                        <h5>{{$product->details}}</h5>
                    </div>
                </div>
                
                <form action="{{route('shop.store')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->name}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <button type="submit" class="btn btn-sm btn-primary">Add to Cart</button>
                </form>
                


                <div class="clearfix">
                </div>
            </div>
            <br>
        </div>
    </div>
    @empty
        <p>No items found.</p>
    @endforelse
</div>   
<div align="right">
{{-- {{ $products->links() }}   --}}
{{$products->appends(request()->input())->links()}}
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
                                                    {{moneyformat($likeproduct->price)}}</h5>
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
                                                        {{moneyformat($likeproduct->price)}}</h5>
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
</div>
@endsection

