@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Categories</h3>

        <a href="{{ route('admin.categories.create') }}">Create Category</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ $category->active }}</td>
                        <td>{{ $category->user->email }}</td>
                        <td>{{ $category->created_at}}</td>
                        <td>
                            @can('update-category', $category)
                            <a href="{{route('admin.categories.edit', ['id' => $category->id])}}">
                                Edit
                            </a>
                            @else
                                Acesso não autorizado
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

@endsection