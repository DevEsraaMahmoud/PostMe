<x-admin-master>
    @section('content')
        <h1>User Profile For : {{$user->name}}</h1>
        <div class="row">
            <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data" >
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <img height="60px" width="60px" class="img-profile rounded-circle" src="{{$user->avatar}}">
                </div>

                <div class="form-group">
                    <input name="avatar" type="file">
                </div>


                <div class="form-group">
                    <label for="title">UserName</label>
                    <input type="text" name="name"
                           class="form-control
                           @error('username') is-invalid @enderror "
                           id=""
                           value="{{$user->username}}"
                           >
                </div>
                @error('username')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror


                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="name"
                           class="form-control" id=""
                          value="{{$user->name}}"
                           placeholder="">
                </div>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="title">Email</label>
                    <input type="text" name="email"
                           class="form-control" id=""
                          value="{{$user->email}}"
                           placeholder="">
                </div>

                <div class="form-group">
                    <label for="title">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control">
                </div>
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror


                <div class="form-group">
                    <label for="title">Password Confirm</label>
                    <input type="password"
                           name="password-confirm"
                           class="form-control">
                </div>
                @error('password_confirmation')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <button type="submit" class="btn btn-primary" >Submit</button>
            </form>
        </div>
        @stop
</x-admin-master>