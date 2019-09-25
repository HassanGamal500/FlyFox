@extends('layouts.app')

@section('page_title')
    Create Posts
@endsection

@section('content')

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Create Post</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    @include('partials.validation_errors')
    <form method="POST" action="{{ route('post.store') }}" class="form-horizontal">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>

                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Body</label>

                <div class="col-sm-10">
                    <textarea name="body" class="form-control" placeholder="Content"></textarea>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ route('post.index') }}" class="btn btn-info pull-left">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Create</button>
        </div>
        <!-- /.box-footer -->
    </form>

</div>

@endsection
