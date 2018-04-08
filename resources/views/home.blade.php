@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    <ul class="list-group">
                        @foreach($items as $item) 
                            <li class="list-group-item">
                                {{ $item->name }} ({{ $item->price }})
                                
                                <form action="{{ url('cart') }}" method="post">
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <input type="hidden" value="{{ $item->name }}" name="name">
                                    <input type="hidden" value="{{ $item->price }}" name="price">
                                    <button type="submit" class="float-right btn-success">Add To Cart</button>
                                    {{ csrf_field() }}


                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
