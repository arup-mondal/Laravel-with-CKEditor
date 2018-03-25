@extends('layout.app')
@section('content')
<div class="panel panel-default">
    <div className="jumbotron">
        <h1>Laravel with CKEditor</h1> 
        <p>Add and update posts with Laravel 5.6 and CKEditor 5</p> 
        <a href="{{ url('/blog/create') }}" class="btn btn-info mb-10">Add a post</a>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
                @if(count($posts) > 0)    
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{!! $post->content !!}</td>
                            <td><a href="{{ url('/blog/'.$post->id.'/edit') }}" class="btn btn-info">Edit</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No posts available at this moment!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection