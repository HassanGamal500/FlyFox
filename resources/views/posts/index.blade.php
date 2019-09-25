@extends('layouts.app')

@section('page_title')
    Posts
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Posts Table</h3>
        <a href="{{url(route('post.create'))}}" class="badge bg-blue pull-right"><i class="fa fa-plus"></i> New Post</a>
    </div>
    @include('flash::message')
    <div class="clearfix"></div>
    <!-- /.box-header -->
    @if(count($posts))
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 200px">Title</th>
                    <th style="width: 200px">Body</th>
                    <th style="width: 100px">User</th>
                    <th style="width: 40px; text-align: center">Edit</th>
                    <th style="width: 40px; text-align: center">Delete</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->user_id}}</td>
                    <td style="text-align: center"><a href="{{url(route('post.edit', $post->id))}}" class="badge bg-green"><i class="fa fa-edit"></i></a></td>
                    <td style="text-align: center">
                        <form method="POST" action="{{route('post.destroy', $post->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="badge bg-red"><i class="fa fa-trash-o"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            No Data
        </div>
    @endif
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
</div>
<!-- /.box -->

@endsection
