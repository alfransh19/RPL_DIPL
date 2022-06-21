@extends('layouts.main')
@section('container')
    @if(Session::has('cart'))
        <div class= row>
            <div class = "col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    <!-- @foreach ($books as $book) -->
                        <li class="list-group-itmes">
                            <span class="badge">{{ $book['qty'] }}</span>
                            <strong>{{ $book['item']['title'] }}</strong>
                            <span class="label label-success">
                                {{ $book['price'] }}
                            </span>
                            <div class="btn-group">
                                <button type="button" class="btn-group btn-xs dropdown-toogle" data-toggle="dropdown">
                                    Action <span class = "caret"></span>
                                </button>
                                <ul class = "dropdown-menu">
                                    <li><a href="#">Reduce by 1</a></li>
                                    <li><a href="#">Reduce all</a></li>
                                </ul>
                            </div>
                        </li>
                    <!-- @endforeach -->
                </ul>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <strong>Total : {{ $totalPrice }}</strong>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <button type="button" class="btn btn-success">Checkout</button>
                </div>
            </div>
        </div>
    @else
    <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <strong>No Item In Cart</strong>
                </div>
    </div>
    @endif
@endsection
