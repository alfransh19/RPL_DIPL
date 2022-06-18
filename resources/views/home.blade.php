@extends('layouts.main')
@section('container')
    

    <div class="container">
      @if ($books->count() == 0)
      <p class="text-center">There are no items.</p>
      @else
      @foreach ($books->chunk(3) as $bookChunk)
        <div class="row">
          @foreach ($bookChunk as $book)
          <div class="col mb-3">
            {{-- Card --}}
            <div class="card" style="width: 18rem;">
                <img src="{{$book->bookImage}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$book->title}}</h5>
                  <div class="overflow-auto" style="height: 100px">
                    <p class="card-text synopsis">{{$book->synopsis}}</p>
                  </div>
                  <div>
                    <div class="float-start price">${{$book->price}}</div>
                    <a href="#" class="btn btn-success float-end">Add to Cart</a>
                  </div>
                </div>
            </div>
          </div>
          @endforeach
        </div>
      @endforeach
      @endif
      <div class="d-flex justify-content-center">
        {{$books->links()}}
      </div>
    </div>
    
@endsection
