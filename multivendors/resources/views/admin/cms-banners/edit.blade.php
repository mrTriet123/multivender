@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-banners.title')</h3>
    {!! Form::model($cms_banner, ['method' => 'PUT', 'route' => ['admin.banners.update',$cms_banner->id],'enctype'=>'multipart/form-data']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>
        
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Banner Title*</label>
                    <input class="form-control" placeholder=""  name="title" type="text" id="title" value="{{$cms_banner->title}}">
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
                        @foreach($type_banners as $type_banner)
                            <option
                                @if($cms_banner->type_banner_id == $type_banner->id)
                                    {{"selected"}}
                                @endif
                                value="{{$type_banner->id}}">{{$type_banner->type}}</option>
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
                    @if($cms_banner->type_banner_id == 1)
                        <p>
                            <img id="image_banner" width="200px;" src="/upload/admin/banner/{{$cms_banner->image}}">
                        </p>
                        <input class="input-file uniform_on form-control" id="fileInput" type="file" name="image">
                    @else
                        <input class="input-file uniform_on form-control" id="fileInput" type="file" name="image" disabled="disabled">
                    @endif
                        
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Banner HTML</label>
                    <textarea class="form-control" id="article-ckeditor" name="text">{{$cms_banner->html}}</textarea>
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
                    <input class="form-control" placeholder=""  name="url" type="url" id="url" value="{{$cms_banner->url}}">
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
                            @if($cms_banner-> openlink == "Yes")
                                <option value="1" selected="">Yes</option>
                                <option value="2" >No</option>
                            @else
                                <option value="1" >Yes</option>
                                <option value="2" selected="">No</option>
                            @endif
                            
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
                $( "#image_banner" ).css( "display","none");
            }else{
                $( "#fileInput" ).removeAttr( "disabled");
                $( "#image_banner" ).css( "display","block");
            }
            
        });
    </script>  
@endsection
