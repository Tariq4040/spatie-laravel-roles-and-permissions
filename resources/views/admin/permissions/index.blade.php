@extends('components.leftsidebar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @section('title')
             Permisssion 
            @endsection
            </title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @section('body-content')

        <div>
            <h1 class="text-center text-primary m-4">User Permissions DashBoard</h1>
            <div class="py-12">
            <div style="margin-left: 30px;">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show"  id="success-alert" role="alert" style="width: 65%">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row" style="margin: 10px;width: 950px;">

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Sr#</th>
                                            <th scope="col">User Permission</th>
                                            <th scope="col">Updated At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($permissions as $permission)
                                            <tr>
                                                <th scope="row">{{ $permissions->firstItem() + $loop->index }}</th>
                                                <td>{{ $permission->name }}</td>

                                                <td>
                                                    {{ $permission->updated_at == NULL ? "Date Not Set": Carbon\Carbon::parse($permission->updated_at)->diffforhumans()}}
                                                </td>

                                                <td>
                                                    <a href="{{ url('admin/permission/edit',$permission->id) }}" class="btn btn-sm btn-primary pr-2">Edit</a>
                                                    <a href="{{ url('admin/permission/delete' ,$permission->id) }}" class="btn btn-sm btn-danger"
                                                    onClick="return confirm('Are You Sure to delete this Permission')" >Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{ $permissions->links() }}
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin.permissions-create') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Add User Permission</label>
                                            <input type="text" name="name" class="form-control mb-2" placeholder="Enter Permission" value="{{ old('name') }}" require>
                                            <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                            </span> 
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit Me</button> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#success-alert").hide();
        $("#success-alert").fadeTo(3000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });
    });
</script>

