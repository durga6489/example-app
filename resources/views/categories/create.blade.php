@extends('app')

@section('title', 'Add Category')

@section('content')
    <div class="container mt-5">
        <h1>Add Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Enabled</option>
                    <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Disabled</option>
                </select>
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="parent_id">Parent :</label>
                <select id="parent_id" name="parent_id" class="form-control">
                    <option value="">None</option>
                    @foreach($categories as $id => $path)
                        <option value="{{ $id }}" {{ old('parent_id') == $id ? 'selected' : '' }}>{{ $path }}</option>
                    @endforeach
                </select>
                @error('parent_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>
@endsection
