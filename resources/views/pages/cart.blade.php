@extends ('layouts.app')


@section('content')

<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item" aria-current="page">Shop</li>
          <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
</nav>
@if(Cart::count() > 0)
    <h2>{{Cart::count()}} item(s) in Shopping Cart</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                        <tr>
                                
                                
                            <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="{{route('shop.show', $item->model->slug)}}"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->name}}</a></h4>
                                    <h6 class="media-heading"><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->details}}</a></h6>
                                    {{-- <h5 class="media-heading"> by <a href="{{route('shop.show', $item->model->slug)}}">Brand name</a></h5> --}}
                                    <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                </div>
                            </div></td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                            {{-- <input type="email" class="form-control" id="exampleInputEmail1" value="{{Cart::count()}}"> --}}
                            <select class="form-control quantity" name="quantity" id="quantity" data-id="{{$item->rowId}}">
                                @for($i = 1; $i < 10 + 1 ; $i++)
                                <option{{ $item->qty == $i ? 'selected' : ''}}>{{$i}}</option>
                                @endfor

                                {{-- <option value ="1" >1</option>
                                <option value ="2" >2</option>
                                <option value ="3" >3</option>
                                <option value ="4" >4</option>
                                <option value ="5" >5</option> --}}
                            </select> 
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>{{moneyformat($item->model->price)}}</strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>{{moneyformat($item->model->price * $item->qty)}}</strong></td>
                            <td class="col-sm-1 col-md-1">
                                <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class ="btn btn-danger">Remove</button>
                                </form>
                                <br>
                                <form action="{{route('cart.switchToSaveForLater', $item->rowId)}}" method="POST">
                                        {{csrf_field()}}
                                        {{-- <button type="button" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> Remove
                                        </button> --}}
                                        <button type="submit" class ="btn">Save for later</button>
                                </form>
                            </td>    
                        </tr>
                        @endforeach

                        {{-- <tr>
                            <td class="col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">Product name</a></h4>
                                    <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                    <span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>
                                </div>
                            </div></td>
                            <td class="col-md-1" style="text-align: center">
                            <input type="email" class="form-control" id="exampleInputEmail1" value="2">
                            </td>
                            <td class="col-md-1 text-center"><strong>$4.99</strong></td>
                            <td class="col-md-1 text-center"><strong>$9.98</strong></td>
                            <td class="col-md-1">
                            <button type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Remove
                            </button></td>
                        </tr> --}}


                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h5>Subtotal</h5></td>
                            <td class="text-right"><h5><strong>{{moneyformat(Cart::subtotal())}}</strong></h5></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h5>Tax</h5></td>
                            <td class="text-right"><h5><strong>{{moneyformat(Cart::tax())}}</strong></h5></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h3>Total</h3></td>
                            <td class="text-right"><h3><strong>{{moneyformat(Cart::total())}}</strong></h3></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>

                        
                            <button type="button" class="btn btn-default"><a href="{{route('shop.index')}}">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping</a>
                            </button></td>
                            <td>
                            <button type="button" class="btn btn-success"><a href="{{route('checkout.index')}}">
                                Checkout <span class="glyphicon glyphicon-play"></span></a>
                            </button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <h2>No items in Cart</h2>
    <button type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-shopping-cart"></span> <a href= "{{route('shop.index')}}">Continue Shopping</a>
    </button>
@endif

@if (Cart::instance('saveForLater')->count() > 0)
    <h2>{{Cart::instance('saveForLater')->count()}} item(s) Save For Later</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::instance('saveForLater')->content() as $item)
                        <tr>
                            <td class="col-sm-8 col-md-6">
                            
                            <div class="media">
                                <a class="thumbnail pull-left" href="{{route('shop.show', $item->model->slug)}}"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->name}}</a></h4>
                                    <h6 class="media-heading"><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->details}}</a></h6>
                                    {{-- <h5 class="media-heading"> by <a href="{{route('shop.show', $item->model->slug)}}">Brand name</a></h5> --}}
                                    <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                </div>
                            </div></td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input type="email" class="form-control" id="exampleInputEmail1" value="{{Cart::instance('saveForLater')->count()}}">
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>{{moneyformat($item->model->price)}}</strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>{{moneyformat($item->model->price * Cart::instance('saveForLater')->count())}}</strong></td>
                            <td class="col-sm-1 col-md-1">
                                <form action="{{route('saveForLater.destroy', $item->rowId)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class ="btn btn-danger">Remove</button>
                                </form>
                                <br>
                                <form action="{{route('saveForLater.switchToCart', $item->rowId)}}" method="POST">
                                        {{csrf_field()}}
                                        {{-- <button type="button" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> Remove
                                        </button> --}}
                                        <button type="submit" class ="btn">Move to Cart</button>
                                </form>
                            </td>    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <h3>You have no items saved for later</h3>
@endif

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
                        @foreach ($mightAlsoLike as $product)
                        <div class="col-sm-4">
                            
                            <div class="col-item">
                                <div class="photo">
                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5><a href = "{{route('shop.show', $product->slug)}}">
                                                {{$product->name}}</h5></a>
                                            <h5 class="price-text-color">
                                                {{moneyformat($product->price)}}</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                    </div>
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
                        @foreach ($mightAlsoLike as $product)
                        <div class="col-sm-4">
                            
                            <div class="col-item">
                                <div class="photo">
                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5><a href = "{{route('shop.show', $product->slug)}}">
                                                {{$product->name}}</h5></a>
                                            <h5 class="price-text-color">
                                                {{moneyformat($product->price)}}</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                    </div>
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
@endsection


@section ('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>    
    (function() {
        const classname = document.querySelectorAll('.quantity')

        Array.from(classname).forEach(function(element){
            element.addEventListener('change', function(){
                const id = element.getAttribute('data-id')
                // axios.post('/cart/$id', {
                
                //     quantity: this.value,
                //     id:id
                    
                // })
                // .then(function (response) {
                //     console.log(response);
                //     // window.location.href = '{{route('cart.index')}}'
                //     console.log(quantity)
                    
                // })
                // .catch(function (error) {
                //     console.log(error);
                //     console.log('error')
                //     // window.location.href = '{{route('cart.index')}}'
                // });

                axios({
                    method: 'post',
                    url: '/carts',
                    data: {
                        quantity: this.value,
                        id:id
                    }
                    
                })
                .then(function (response) {
                    console.log(response.data.carts);
                    window.location.href = '{{route('cart.index')}}'
                    // console.log(quantity)
                    
                })
                .catch(function (error) {
                    console.log(error);
                    console.log('error')
                    // window.location.href = '{{route('cart.index')}}'
                });
                
            })
        })
      })();
    
</script>
@endsection

