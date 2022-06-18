@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Upload New Book</h1>
  </div>
  <div class="col-lg-8">
    <form action="/dashboard/books" method="post">
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" 
          id="title" name="title" required autofocus value="{{old('title')}}">
          @error('title')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
      
        <div class="mb-3">
            <label for="bookImage" class="form-label">Image URL</label>
            <input type="text" class="form-control @error('bookImage') is-invalid @enderror" 
            id="bookImage" name="bookImage" required value="{{old('bookImage')}}">
            @error('bookImage')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="synopsis" class="form-label">Synopsis</label>
            <textarea name="synopsis" id="synopsis" class="form-control 
            @error('synopsis') is-invalid @enderror" required >{{old('synopsis')}}</textarea>
            @error('synopsis')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" 
            id="price" name="price" required value="{{old('price')}}">
            @error('price')
           <div class="invalid-feedback">
             {{$message}}
           </div>
           @enderror
        </div>
        {{-- Submit Button --}}
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success" id="modelButton">Submit</button>
        </div>
    </form>   
  </div>
@endsection
