@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="row">
    @if(Auth::user()->role->role_name !='sales')
      <div class="btn btn-default col-2 text-center">   
        <a href="{{route('categories.create')}}">Add Category</a> 
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
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Actions</th>
                   </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <td>{{ $category->category_name}}</td>
                    <td>{{ $category->category_description}}</td>
                    <td>
                        <a href="{{route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('All the products related to this category will be deleted.Are you sure?')">Delete</button>
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

@endsection