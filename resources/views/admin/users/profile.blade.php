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
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                              </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <th><input type="checkbox"
                                    @foreach($user->roles as $user_role)
                                            @if($user_role->slug ==$role->slug)
                                                checked
                                                @endif
                                            @endforeach
                                        ></th>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->slug}}</td>
                                    <td>
                                        <form method="post" action="{{route('user.role.attach', $user->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <button class="btn btn-primary"
                                            @if($user->roles->contains($role))
                                                disabled
                                                @endif
                                            >Attach</button>
                                            <input type="hidden" name="role" value="{{$role->id}}">
                                        </form>

                                    </td>
                                    <td>
                                    <form method="post" action="{{route('user.role.detach', $user->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <button class="btn btn-danger"
                                                @if(!$user->roles->contains($role))
                                                disabled
                                                @endif
                                        >Detach</button>
                                        <input type="hidden" name="role" value="{{$role->id}}">
                                    </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
</div>
            </div>
        </div>
    @stop
</x-admin-master>