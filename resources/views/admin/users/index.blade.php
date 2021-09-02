<x-admin-master>
    @section('content')
        <h1>Users</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>User Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Avatar</th>
                          {{--  <th>Registered Date</th>
                            <th>Updated profile At </th>--}}
                            <th>Delete </th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>User Name</th>
                            <th>Name</th>
                            <th>Email</th>
                      {{--      <th>Registered Date</th>
                            <th>Updated profile At </th>--}}
                            <th>Delete </th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
{{--
                                <td> <a href="{{route('user.edit', $user->id)}}" >{{$user->title}}</a>
                                </td>
--}}
                                <td>
                                    <div><img height="40px" src="{{$user->avatar}}"></div>
                                </td>
                              {{--  <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>--}}
                                <td>
                                    <form method="post" action="{{route('users.destroy', $user->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @stop
        @section('scripts')
            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
            {{--
                        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
            --}}
        @endsection

</x-admin-master>