@extends ('layouts.app')


@section('content')

<div class= "col-sm-10">
    <div class="product-header">
    <h2>Category</h2>
        <div>   
            <strong>Price :</strong>
            <a href="">Low to High</a> |
            <a href="">High to Low</a>
        </div>
    </div>

@foreach($products as $item)
    <div class="col-sm-3">
        <div class="col-item">
        @foreach($item->colorimage as $index => $image)
            <div class="photo disabled ">
                <a href="">
                <img src="http://placehold.it/350x260" class="img-responsive {{$item->id}}-{{$image->color_id}}-{{$index}}" alt="{{$index}}" id="color-{{$image->color_id}}-{{$index}}"/>{{$image->filename}}
                </a>
            </div>
        @endforeach
            <div class="info">
                <div class="row">
                    <div class="price col-md-8">
                        <h5><a href="">{{$item->id}}-{{$item->name}}</a></h5>
                    </div>
                    <div class="price col-md-4">
                    <h5 class="price-text-color">5454</h5>
                    </div>    
                </div>
                <div class="row">
                    <div class="price col-md-12">
                        <h5>details</h5>
                    </div>
                </div>
                @foreach ($item->color as $colour)
                <h5 class="colors">colors:
						
							<span id ="color-{{$colour->id}}" class="color color-{{$colour->id}}" onclick ="">{{$colour->hexcode}}</span>
							
				</h5>
                @endforeach
            


                <div class="clearfix">
                </div>
            </div>
            <br>
        </div>
    </div>
@endforeach
 
</div>   
@endsection

@section('scripts')

@endsection