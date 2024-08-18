@extends('layout')

@section('content')
@push('title')
    <title>Add Product</title>
@endpush
<h1>Add Product</h1>
    <form action = "{{url('/')}}/product/create" enctype="multipart/form-data" method = "POST">
        @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" >
            <span class="text-danger">
              @error('title')
                  {{ $message }}
              @enderror
          </span>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price">
            <span class="text-danger">
              @error('price')
                  {{ $message }}
              @enderror
          </span>
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity">
            <span class="text-danger">
              @error('quantity')
                  {{ $message }}
              @enderror
          </span>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description">
            <span class="text-danger">
              @error('description')
                  {{ $message }}
              @enderror
          </span>
          </div>
          <div class="form-group row m-b-20">
            <div class="col-12">
                <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a>
                <label for="password">Password</label>
                <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
            </div>
        </div>

          <div class="mb-3">
            <label for="formFile" class="form-label">Product Picture</label>
            <input class="form-control" type="file" id="formFile" name="image">
            <span class="text-danger">
              @error('image')
                  {{ $message }}
              @enderror
          </span>
          </div>

          <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary">Submit</button> 
          </div>
          
    </form>
@endsection