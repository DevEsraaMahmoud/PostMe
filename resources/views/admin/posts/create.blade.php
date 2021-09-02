<x-admin-master>
    @section('content')
    <h1>Create</h1>
        <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
            <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="" aria-describedby="" placeholder="">
            </div>

            <div class="form-group">
            <label for="post_image">File</label>
                <input type="file" name="post_image" class="form-control-form" id="" aria-describedby="" placeholder="">
            </div>
           <div class="form-group">
               <textarea name="body" class="form-control" cols="30" rows="10">
               </textarea>
           </div>
            <button type="submit" class="btn btn-primary" >Submit</button>
            </form>
        @endsection

</x-admin-master>