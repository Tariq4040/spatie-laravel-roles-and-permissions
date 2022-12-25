@extends('components.leftsidebar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @section('title')
             Role Edit 
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
            <h1 class="text-center text-primary m-4">Edit/Update Role DashBoard</h1>
            <div class="py-12">
            <div style="margin-left: 30px;">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show"  id="success-alert" role="alert" style="width: 65%">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row" style="margin: 10px;width: 950px;">

                        <div class="col-md-8" style="margin-left: 120px;">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ url('admin/role/update/'.$roles->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                            <div class="form-group">
                                                <label for="name">Edit role</label>
                                                <input type="text" name="name" class="form-control mb-2" value="{{ $roles->name }}" require>
                                                <span class="text-danger">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                                </span> 
                                            </div>
                                        
                                        <button type="submit" class="btn btn-success">Update Me</button> 
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

