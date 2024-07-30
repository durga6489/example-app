@extends('app')

@section('title', 'Categories')

@section('content')
    <div class="container mt-5">
        <h1>Enabled Categories</h1>

        <!-- Logout Button -->
       @guest
            <!-- Show Login Button Only if Not Authenticated -->
              <a href="{{ route('login') }}" class="btn btn-primary">Login</a>

        @endguest

        @auth
            <!-- Show Logout Button Only if Authenticated -->
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-secondary">Logout</button>
            </form>
        @endauth

                 @auth
                   @if(Auth::user()->role === 'admin')
        
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
                    @endif
                 @endauth
       
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Full Path</th>
                    <th>Status</th>
                    <th>Parent ID</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->category_id }}</td>
                        <td>{{ $category->full_path }}</td>
                        <td>{{ $category->status == 1 ? 'Enabled' : 'Disabled' }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ $category->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $category->updated_at->format('Y-m-d H:i:s') }}</td>
                       <td>
                            @auth
                                @if(Auth::user()->role === 'admin')
                                    <a href="{{ route('categories.edit', $category->category_id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->category_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                                    </form>
                                @endif
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
