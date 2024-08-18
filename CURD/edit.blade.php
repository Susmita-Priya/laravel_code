@extends('layout')

@section('content')

@push('title')
    <title>Update Product</title>
@endpush

@if(session('update'))
<script>
    Swal.fire({
        title: 'Success!',
        text: '{{ session('update') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif


<h1>Update Product</h1>
    <form action = "{{ url('/product/edit/' . $product->id) }}" enctype="multipart/form-data" method = "POST">
        @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}">
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Product Picture</label>
            <input class="form-control" type="file" id="formFile" name="image">
          </div>

          <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary">Ok</button> 
          </div>
    </form>
@endsection