
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-fqas.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.fqas.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <!-- {!! Form::label('fqa_category_id', 'FAQ Category*', ['class' => 'control-label']) !!}
                    {!! Form::select('fqa_category_id', $fqa_categories, old('fqa_category_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fqa_category_id'))
                        <p class="help-block">
                            {{ $errors->first('fqa_category_id') }}
                        </p>
                    @endif -->

                    <select id="fqa_categories" name="fqa_categories" class="form-control placeholder-select">
                        <option value="">Please select</option>
                        @foreach($fqa_categories as $fqa_category)
                            @if (old('fqa_categories') == $fqa_category->id)
                                  <option value="{{$fqa_category->id}}" selected>{{$fqa_category->name}}</option>
                            @else
                                  <option value="{{$fqa_category->id}}">{{$fqa_category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('fqa_categories'))
                        <p class="help-block">
                            {{$errors->first('fqa_categories')}}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Question Title*</label>
                    <input class="form-control" placeholder=""  name="question" type="text" id="name" value="{{old('question')}}">
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
                    <textarea class="form-control" id="article-ckeditor" name="description">{{old('content')}}</textarea>
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