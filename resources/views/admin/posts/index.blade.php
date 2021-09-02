<x-admin-master>
    @section('content')
        <h1>All Posts</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>owner</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At </th>
                            <th>Delete </th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>owner</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At </th>
                            <th>Delete </th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->user->name}}</td>
                            <td> <a href="{{route('posts.edit', $post->id)}}" >{{$post->title}}</a>
                            </td>
                            <td>
                             <div><img height="40px" src="{{$post->post_image}}"></div>
                            </td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                @can('view', $post)
                               <form method="post" action="{{route('posts.destroy', $post->id)}}" enctype="multipart/form-data">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger">Delete</button>
                               </form>
                                @endcan
                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
{{$posts->links()}}
 @endsection
    @section('scripts')
            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
{{--
            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
--}}
        @endsection
</x-admin-master>