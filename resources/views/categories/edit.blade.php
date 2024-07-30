@extends('app')

@section('title', 'Edit Category')

@section('content')
    <div class="container mt-5">
        <h1>Edit Category</h1>
        <form action="{{ route('categories.update', $category->category_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Enabled</option>
                    <option value="2" {{ $category->status == 2 ? 'selected' : '' }}>Disabled</option>
                </select>
            </div>
            <div class="form-group">
                <label for="parent_id"> Parent:</label>
                <select id="parent_id" name="parent_id" class="form-control">
                    <option value="">None</option>
                   @foreach($categoryPaths as $id => $path)
                        <option value="{{ $id }}" {{ $id == $category->parent_id ? 'selected' : '' }}>{{ $path }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection
