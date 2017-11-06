
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-testimonials.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.testimonials.store'],'enctype'=>'multipart/form-data']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Testimonial By*</label>
                    <input class="form-control" placeholder=""  name="name" type="text" id="name" value="{{old('name')}}">
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>        
            </div>
            <div class="row">
                <div class="col-xs-12 form-group ">
                    <label class="control-label" for="fileInput">Testimonial Image</label>
                    <div class="controls">
                        <input class="input-file uniform_on form-control" id="fileInput" type="file" name="image">

                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Testimonial Location*</label>
                    <input class="form-control" placeholder=""  name="location" type="text" id="name" value="{{old('location')}}">
                    @if($errors->has('location'))
                        <p class="help-block">
                            {{ $errors->first('location') }}
                        </p>
                    @endif
                </div>        
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="article-ckeditor">Testimonial Text*</label>
                    <textarea class="form-control" id="article-ckeditor" name="text">{{old('content')}}</textarea>
                    @if($errors->has('text'))
                        <p class="help-block">
                            {{ $errors->first('text') }}
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