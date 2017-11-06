@extends('layouts.app')

@section('content')
    <h3 class="page-title">Categories</h3>

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="row">
            <form action="/admin/manager/categories" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('quickadmin.qa_create')
                    </div>
                    
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Name*</label>
                                <input class="form-control" placeholder=""  name="name" type="text" id="name" value="{{old('name')}}">
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
                                <select id="select_cate" class="form-control placeholder-select" name="categories">
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
                                        
                                            <option value="{{$cate->id}}">{{$pre.$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12 form-group ">
                                <label class="control-label" for="fileInput">Banner</label>
                                <div class="controls">
                                    <input class="input-file uniform_on form-control" id="fileInput" type="file" name="banner">

                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="article-ckeditor">Discription*</label>
                                <textarea name="description" id="tag-description" rows="5" cols="40"></textarea>
                                @if($errors->has('description'))
                                    <p class="help-block">
                                        {{ $errors->first('description') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        
                         {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}    
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <form method="post" action="" accept-charset="UTF-8">
            <div class="search-wrap">
                <input type="text" id="myInput" placeholder="Search for names.." title="Type in a name">
            </div>
            <div class="alignleft actions bulkactions">
                <select name="action" id="action-selector">
                    <option value="-1">Bulk Actions</option>
                    <option value="delete">Delete</option>
                </select>
                <input type="submit" id="submitCheck" class="button action" value="Apply">
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('quickadmin.qa_list')
                </div>

                <div class="panel-body table-responsive">

                    <table class="table table-hover table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th style="text-align:center;"><input type="checkbox" id="selectAll"/></th>
                                <th width="35%">Name</th>
                                <th >Banner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($categories) > 0)
                                @foreach ($categories as $key => $category)
                                    <tr data-entry-id="{{ $category->id }}" class="data-entry" id="{{$category->id}}">
                                            <td style="text-align:center;"><input type="checkbox" name="" value="{{$category->id}}" class="messageCheckbox"></td>
                                            <td class="cate_name">
                                                <?php
                                                $level = substr_count($category->path, '.');
                                                // echo $level;
                                                $pre = "";
                                                if($level) {
                                                    for($i=0; $i<$level; $i++) {
                                                        $pre .= "— ";
                                                    }
                                                }
                                                ?>
                                                {{$pre.$category->name}}
                                                
                                            </td>   
                                            <td><img width="50px;" src="{{url('./upload/admin/category/'.$category->banner)}}"></td>
                                            <td>
                                            
                                                <a href="" class="btn btn-xs btn-info" title="" data-toggle="tooltip" data-original-title="View">
                                                    <i class="fa fa-list-alt"></i>
                                                </a>
                                                <a href="categories/{{$category->id}}/edit" class="btn btn-xs btn-primary" title="" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="categories/{{$category->id}}/delete" class="btn btn-xs btn-danger" title="" data-toggle="tooltip" data-original-title="Delete">
                                                    <i class="fa fa-trash"></i>
                                            </td>
                                   </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">@lang('quickadmin.qa_no_entries_in_table')</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
@stop

@section('javascript') 
    <script>
    //checked all table
        $('#selectAll').click(function(e) {
            if($(this).hasClass('checkedAll')) {
              $('input').prop('checked', false);   
              $(this).removeClass('checkedAll');
            } else {
              $('input').prop('checked', true);
              $(this).addClass('checkedAll');
            }
        });

    //Delete checked
        $('#submitCheck').click(function(e){
            e.preventDefault();
            var ddl = document.getElementById("action-selector");
            var selectedValue = ddl.options[ddl.selectedIndex].value;
            if (selectedValue == "delete"){
                
                var arr = [];
                var inputElements = document.getElementsByClassName('messageCheckbox');
                for (var i=0; inputElements[i]; ++i) {
                    if (inputElements[i].checked) {
                        var str_val = inputElements[i].value;
                        var num_val = parseInt(str_val);
                        arr.push(num_val);
                    }
                }
                // console.log(arr);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'type' : 'POST',
                    'url' : 'checkDelete',
                    'data' : {
                        id : arr
                    },
                    success: function(data){
                        if(data.result == 0){
                            console.log('0');
                            window.location.reload();
                        }
                        if(data.result == 1){
                            console.log('1');
                            window.location.reload();
                        }
                    }
                });
            }     
        });

        var repeat = function(str, count) {
            var array = [];
            for(var i = 0; i < count;)
                array[i++] = str;
            return array.join('');
        }

        $('.quick-edit').click(function(){
            console.log(this.id)
        });


        //Search for names in table
        var $rows = $('#myTable tbody tr');
        $('#myInput').keyup(function() {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
            
            $rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
        });

    </script>
@endsection