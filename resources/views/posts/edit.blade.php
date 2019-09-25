@extends('layouts.app')

@section('page_title')
    Edit User
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Post</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @include('partials.validation_errors')
        <form method="POST" action="{{ route('post.update', $model->id) }}" class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="box-body">
                @include('flash::message')
                <div class="form-group">
                    <label class="col-sm-2 control-label">Title</label>

                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$model->title}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Body</label>

                    <div class="col-sm-10">
                        <textarea name="body" class="form-control" placeholder="Content">{{$model->body}}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ route('post.index') }}" class="btn btn-info pull-left">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Update</button>
            </div>
            <!-- /.box-footer -->
        </form>

    </div>

@endsection
