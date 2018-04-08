@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cart</div>

                <div class="card-body">
                    

                    <ul class="list-group">
                        @foreach($cart as $item) 
                            <li class="list-group-item">
                                <a href="{{ url('cart-remove/' . $item->id) }}" class="btn btn-danger btn-sm">
                                    X
                                </a>
                                {{ $item->name }} ({{ $item->price }} * {{ $item->quantity }})
                                <span class="float-right">
                                    ${{ $item->price * $item->quantity }}
                                </span>
                            </li>
                        @endforeach
                        <li class="list-group-item bg-success text-white">
                            Total 
                            <span class="float-right">
                                ${{ $total }}
                            </span>
                        </li>
                    </ul>
                    <br>
                    <div class="text-center">
                        <a href="{{ url('confirm-order') }}" class="btn btn-primary">Confirm Order</a>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
