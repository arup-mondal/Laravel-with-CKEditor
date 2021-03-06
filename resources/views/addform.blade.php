@extends('layout.app')
@section('content')
    <form action="{{ url('/blog') }}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="title">Title</label>
                <input id="title" name="title" class="form-control" value=""  type="text" placeholder="Enter title" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control" required="" rows="10" placeholder="Enter your Content">
                </textarea>
            </div>
        </div>
        <input type="submit" class="btn btn-success btn-lg pull-right" value="Save" >
    </form>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .then(editor => {
                document.getElementById('content').innerHTML = editor.getData();
            })
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection