
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-fqas.title')</h3>
    {!! Form::model($cms_fqa, ['method' => 'PUT', 'route' => ['admin.fqas.update', $cms_fqa->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <select id="fqa_categories" name="fqa_categories" class="form-control placeholder-select">
                        @foreach($fqa_categories as $fqa_category)
                            <option
                                @if($cms_fqa->fqa_category_id == $fqa_category->id)
                                    {{"selected"}}
                                @endif
                                value="{{$fqa_category->id}}">{{$fqa_category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Question Title*</label>
                    <input class="form-control" placeholder=""  name="question" type="text" id="name" value="{{$cms_fqa->question}}">
                    @if($errors->has('question'))
                        <p class="help-block">
                            {{ $errors->first('question') }}
                        </p>
                    @endif
                </div>        
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="article-ckeditor">Description</label>
                    <textarea class="form-control" id="article-ckeditor" name="description">{{$cms_fqa->description}}</textarea>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
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