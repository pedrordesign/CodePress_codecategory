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
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->active }}</td>
                        <td>{{ $category->created_at}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

@endsection