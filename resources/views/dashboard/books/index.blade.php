@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Book Lists</h1>
</div>
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif

<div class="table-responsive col-lg-8">
    <a href="/dashboard/books/create" class="btn mb-3 btn-primary">
        Upload new book
    </a>
    <table class="table table-bordered table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Title</th>
          <th scope="col">Synopsis</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($books as $book)
        <tr>
            {{-- Items --}}
            <td >{{$loop->iteration}}</td>
            <td class="image"><img src="{{$book->bookImage}}" class="img-thumbnail" alt="bookImage"></td>
            <td>{{$book->title}}</td>
            <td class="overflow-auto">
                <p class="text-break">
                    {{$book->synopsis}}
                </p>
            </td>
            <td>${{$book->price}}</td>
            {{-- Buttons --}}
            <td>
                <a href="/dashboard/books/{{$book->id}}/edit" class="badge bg-warning">
                    <span data-feather="edit"></span>
                </a>

                <form action="/dashboard/books/{{$book->id}}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                        <span data-feather="trash-2">
                    </span></button>
                </form>  
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection