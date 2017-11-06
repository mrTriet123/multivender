@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-cms-pages.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.pages.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Title*</label>
                    <input class="form-control" placeholder=""  name="title" type="text" id="name" value="{{old('title')}}">
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>        
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="article-ckeditor">Content*</label>
                    <textarea class="form-control" id="article-ckeditor" name="content" value="{{old('content')}}"></textarea>
                    @if($errors->has('content'))
                        <p class="help-block">
                            {{ $errors->first('content') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection
@section('javascript')
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>  
@endsection

