<x-admin-master>
    @section('content')
        <h1>Edit Post</h1>
        <form method="post" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{$post->title}}">
            </div>

            <div class="form-group">
                <img height="100px" src="{{$post->post_image}}">
                <label for="post_image">File</label>
                <input type="file" name="post_image" class="form-control-form">
            </div>
            <div class="form-group">
               <textarea name="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary" >Submit</button>
        </form>

        @endsection
</x-admin-master>