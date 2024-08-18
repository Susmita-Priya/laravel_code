@extends('layout')
@push('title')
    <title>Products</title>
@endpush
@section('content')

<h1 class="text-center mt-5">Products</h1>

@if(session('success'))
<script>
    Swal.fire({
        title: 'Success!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif

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

@if(session('delete'))
<script>
    Swal.fire({
        title: 'Success!',
        text: '{{ session('delete') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif

<div class="d-flex justify-content-end mt-6">
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" name="search" id="serach" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
<a class="nav-link ms-auto" href="{{route('product.create')}}">
    <button type="submit" class="btn btn-primary">Add Product</button> 
</a>
</div>
<div
    class="table-responsive">
    <table
        class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
               <tr class="">
                <td scope="row">{{ $product -> id }}</td>
                <td>{{ $product -> title }}</td>
                <td>{{ $product -> price }}</td>
                <td>{{ $product -> quantity }}</td>
                <td>{{ $product -> description }}</td>
                <td><img src="{{ asset($product->image) }}" style="width:27%; height:27%" alt="Product Image"></td>
                <td>
                    <span class="badge badge-success">Active</span>
                    
                    {{-- @if ($customer->status == "1")
                    <a href="">
                        <span class="badge badge-success">Active</span>
                    </a>
                    @else
                    <a href="">
                        <span class="badge badge-danger">Inactive</span>
                    </a>
                    @endif --}}
                </td>

                <td>
                    {{-- <a href="{{ url('/') }}/delete/{{ $customer->id }}"> --}}

                    <a id="delete" href="{{ route('product.delete',['id'=> $product->id]) }}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </a>

                    {{-- <a id="update" href="{{ url('/') }}/edit/{{ $customer->id }}"> --}}

                    <a id="edit" href="{{ route('product.edit',['id'=> $product->id]) }}">
                    <button type="submit" class="btn btn-success">Edit</button>
                    </a>
                </td>
            </tr> 
            @endforeach
            
        </tbody>
    </table>
</div>

{{-- <script>
    $(document).on("click", "#delete", function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    

    Swal.fire({
        title: 'Are you sure?',
        // text: "You won't be able to Delete this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = link;
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'              
            )
        }else{
            Swal.fire(
                'Cancelled!',
                'Your imaginary file is safe.',
                'error'
            )
        }
    });
});
</script> --}}
@endsection
