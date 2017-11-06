
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Categories</h3>
    <form action="/admin/manager/categories/{{$category->id}}/edit" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

         <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.qa_create')
            </div>
            
            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="name" class="control-label">Name*</label>
                        <input class="form-control" placeholder=""  name="name" type="text" id="name" value="{{$category->name}}">
                        @if($errors->has('name'))
                            <p class="help-block">
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                    </div>        
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="name" class="control-label">Parent*</label>
                        <select id="select_cate" name="categories" class="form-control placeholder-select">
                            <option value="0">None</option>
                        @foreach($categories as $cate)
                            <?php
                                $level = substr_count($cate->path, '.');
                                // echo $level;
                                $pre = "";
                                if($level) {
                                    for($i=0; $i<$level; $i++) {
                                        $pre .= "&nbsp;&nbsp;&nbsp;";
                                    }
                                }
                            ?>
                            
                                <option 
                                @if($category->parent_id == $cate->id)
                                    {{"selected"}}
                                @endif
                                value="{{$cate->id}}">{{$pre.$cate->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group ">
                        <label class="control-label" for="fileInput">Banner</label>
                        <p>
                            <img width="200px;" src="{{url('./upload/admin/category/'.$category->banner)}}">
                        </p>
                        <div class="controls">
                            <input class="input-file uniform_on form-control" id="fileInput" type="file" name="banner">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="article-ckeditor">Discription*</label>
                        <textarea name="description" id="tag-description" rows="5" cols="40">{{$category->description}}</textarea>
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
    </form>
@endsection
@section('javascript')
   <!--  <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>   -->
@endsection