<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>User DashBoard</title>
  </head>
  <body>
    <div>
        <h1 class="text-center text-primary m-4">User DashBoard</h1>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show"  id="success-alert" role="alert" style="width: 65%">
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row" style="margin: 10px">

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Sr#</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">User Email</th>
                                        <th scope="col">Updated At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>

                                            <td>{{ $user->updated_at == NULL ? "Date Not Set": Carbon\Carbon::parse($user->updated_at)->diffforhumans()}}</td>

                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary pr-2">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger"
                                                   onClick="return confirm('Are You Sure to delete this Brand')" >Delete</a>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('add-users') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" name="name" class="form-control mb-2" value="{{ old('name') }}">
                                        <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                        <br>
                                        <label for="email">User Email</label>
                                        <input type="email" name="email" class="form-control mb-2" value="{{ old('email') }}">
                                        <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                        <label for="password">User Password</label>
                                        <input type="password" name="password" class="form-control mb-2" value="{{ old('password') }}">
                                        <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                        
                                        <br>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add New User</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 
    </div>
  </body>
</html>
