@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
@endif

@if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
@endif 


{{-- @if(Cart::count() > 0)
        <h2>{{Cart::count()}} item(s) in Shopping Cart</h2>
@else
        <h2>No items in Cart</h2>
@endif --}}