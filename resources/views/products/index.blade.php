@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="row">
        @if(Auth::user()->role->role_name !='sales')
        <div class="btn btn-default col-2 text-center">   
            <a href="{{route('products.create')}}">Add Product</a> 
        </div>
        @endif
  </div>
    <div class="row">
        <div class="col-12">
        <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="user1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                    <tr> 
                        <td>{{ $product->product_name }}</td>
                        <td>
                        <!-- Clickable Category Name -->
                            <a href="javascript:void(0)" 
                            class="text-primary category-info" 
                            data-id="{{ $product->category_id }}">
                                {{ $product->category->category_name }}
                            </a>
                        </td>
                
                        <td>${{ number_format($product->product_price, 2) }}</td>
                        <td>
                            @if($product->product_image)
                            <img src="{{ asset('storage/uploads/images/' . $product->product_image) }}" alt="Product Image" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Category Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Category Name:</strong> <span id="category-name"></span></p>
                <p><strong>Description:</strong> <span id="category-description"></span></p>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    //$('#categoryModal').modal('show');
    $('.category-info').on('click', function(){
        var categoryId = $(this).data('id');
        console.log(categoryId,"categoryId");
        $.ajax({
            url: '/categories/' + categoryId + '/details',
            type: 'GET',
            success: function(response) {
                console.log(response,"vaihsali");
                $('#category-name').text(response.name);
                $('#category-description').text(response.description);
                $('#categoryModal').modal('show');
            },
            error: function() {
                alert('Error fetching category details.');
            }
        });
    });
    $("#user1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,"ordering": false,
    });
});
</script>

@endsection