
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-banners.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.banners.store'],'enctype'=>'multipart/form-data']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Banner Title*</label>
                    <input class="form-control" placeholder=""  name="title" type="text" id="title" value="{{old('title')}}">
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>        
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <select id="type_banners" name="type_banners" class="form-control placeholder-select">
                        <option value="">Please select</option>
                        @foreach($type_banners as $type_banner)
                            @if (old('type_banners') == $type_banner->id)
                                  <option value="{{$type_banner->id}}" selected>{{$type_banner->type}}</option>
                            @else
                                  <option value="{{$type_banner->id}}">{{$type_banner->type}}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('type_banners'))
                        <p class="help-block">
                            {{$errors->first('type_banners')}}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group ">
                    <label class="control-label" for="fileInput">Banner Image</label>
                    <div class="controls">
                        <input class="input-file uniform_on form-control" id="fileInput" type="file" name="image">

                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Banner HTML</label>
                    <textarea class="form-control" id="article-ckeditor" name="text"></textarea>
                    @if($errors->has('text'))
                        <p class="help-block">
                            {{ $errors->first('text') }}
                        </p>
                    @endif
                </div>        
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group ">
                    <label for="name" class="control-label">Banner URL</label>
                    <input class="form-control" placeholder=""  name="url" type="url" id="url" value="{{old('url')}}">
                    @if($errors->has('url'))
                        <p class="help-block">
                            {{ $errors->first('url') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group ">
                    <label class="control-label" for="fileInput">Open Link in New Tab</label>
                    <div class="controls">
                        <select id="open_link" name="open_link" class="form-control placeholder-select">
                            <option value="">Please select</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                        @if($errors->has('open_link'))
                            <p class="help-block">
                                {{$errors->first('open_link')}}
                            </p>
                        @endif
                    </div>
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

        $('#type_banners').change(function(){

            var test = $('#type_banners').find('option:selected').text();

            if(test === "HTML"){
                $( "#fileInput" ).attr( "disabled","disabled");
            }else{
                $( "#fileInput" ).removeAttr( "disabled");
            }
            
        });
    </script>  
@endsection