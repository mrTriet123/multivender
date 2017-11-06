@extends('layouts.app')

@section('content')
    <h3 class="page-title">Products Managements</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">General</a></li>
                    <li><a data-toggle="tab" href="#menu1">Data</a></li>
                    <li><a data-toggle="tab" href="#menu2">SEO</a></li>
                    <li><a data-toggle="tab" href="#menu3">Specification</a></li>
                    <li><a data-toggle="tab" href="#menu4">QTY Discount</a></li>
                    <li><a data-toggle="tab" href="#menu5">Special Discount</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        {!! Form::model($product, ['method' => 'PUT', 'route' => ['admin.products.update',$product->id],'enctype'=>'multipart/form-data']) !!}
                        <h3>General</h3>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Product Shop *</label>
                                <select id="shops" name="shops" class="form-control placeholder-select">
                                    <option value="">Please select</option>
                                    @foreach($shops as $shop)
                                        @if ($product->shop_id == $shop->id)
                                              <option value="{{$shop->id}}" selected>{{$shop->name}}</option>
                                        @else
                                              <option value="{{$shop->id}}">{{$shop->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('shops'))
                                    <p class="help-block">
                                        {{$errors->first('shops')}}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Name*</label>
                                <input class="form-control" placeholder=""  name="name" type="text" id="name" value="{{$product->name}}">
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>        
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Price*</label>
                                <input class="form-control" placeholder=""  name="price" type="text" id="price" value="{{$product->price}}">
                                @if($errors->has('price'))
                                    <p class="help-block">
                                        {{ $errors->first('price') }}
                                    </p>
                                @endif
                            </div>        
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Quantity*</label>
                                <input class="form-control" placeholder=""  name="quantity" type="text" id="quantity" value="{{$product->quantity}}">
                                @if($errors->has('quantity'))
                                    <p class="help-block">
                                        {{ $errors->first('quantity') }}
                                    </p>
                                @endif
                            </div>        
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Minimum Quantity*</label>
                                <input class="form-control" placeholder=""  name="mini_quantity" type="text" id="mini_quantity" value="{{$product->minimum_quantity}}">
                                @if($errors->has('mini_quantity'))
                                    <p class="help-block">
                                        {{ $errors->first('mini_quantity') }}
                                    </p>
                                @endif
                            </div>        
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Brand*</label>
                                <select id="brands" name="brands" class="form-control placeholder-select">
                                    <option value="">Please select</option>
                                    @foreach($brands as $brand)
                                        @if ($product->brand_id == $brand->id)
                                              <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                                        @else
                                              <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('brands'))
                                    <p class="help-block">
                                        {{$errors->first('brands')}}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Product Category *</label>
                                <select id="categories" name="categories" class="form-control placeholder-select">
                                    <option value="">Please select</option>
                                    @foreach($categories as $category)

                                        <?php
                                            $level = substr_count($category->path, '.');
                                            // echo $level;
                                            $pre = "";
                                            if($level) {
                                                for($i=0; $i<$level; $i++) {
                                                    $pre .= "&nbsp;&nbsp;&nbsp;";
                                                }
                                            }
                                        ?>
                                        @if($product->category_id == $category->id)
                                            <option value="{{$category->id}}" selected>{{$pre.$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$pre.$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('categories'))
                                    <p class="help-block">
                                        {{$errors->first('categories')}}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Model *</label>
                                <input class="form-control" placeholder=""  name="model" type="text" id="model" value="{{$product->model}}">
                                @if($errors->has('model'))
                                    <p class="help-block">
                                        {{ $errors->first('model') }}
                                    </p>
                                @endif
                            </div>        
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">SKU *</label>
                                <input class="form-control" placeholder=""  name="sku" type="text" id="sku" value="{{$product->sku}}">
                                @if($errors->has('sku'))
                                    <p class="help-block">
                                        {{ $errors->first('sku') }}
                                    </p>
                                @endif
                            </div>        
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Condition*</label>
                                <select id="condition" name="condition" class="form-control placeholder-select">
                                    <option value="">Please select</option>
                                    
                                    @if($product-> condition == "New")
                                        <option value="1" selected="">New</option>
                                        <option value="2">Used</option>
                                        <option value="3">Refurbished</option>
                                    @endif
                                    @if($product-> condition == "Used")
                                        <option value="1">New</option>
                                        <option value="2" selected="">Used</option>
                                        <option value="3">Refurbished</option>
                                    @endif
                                    @if($product-> condition == "Refurbished")
                                        <option value="1">New</option>
                                        <option value="2">Used</option>
                                        <option value="3" selected="">Refurbished</option>
                                    @endif
                                </select>
                                @if($errors->has('condition'))
                                    <p class="help-block">
                                        {{$errors->first('condition')}}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Active*</label>
                                <select id="active" name="active" class="form-control placeholder-select">
                                    <option value="">Please select</option>
                                    @if($product-> status == "Yes")
                                        <option value="1" selected="">Yes</option>
                                        <option value="2" >No</option>
                                    @else
                                        <option value="1" >Yes</option>
                                        <option value="2" selected="">No</option>
                                    @endif
                                </select>
                                @if($errors->has('active'))
                                    <p class="help-block">
                                        {{$errors->first('active')}}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group ">
                                <label class="control-label" for="fileInput">Photo(s)</label>
                                <div class="controls">
                                    <input class="input-file uniform_on form-control" id="fileInput" type="file" name="image[]" multiple>
                                    <ul id="product_photo">
                                        <?php 
                                            $file_imgs = explode('|', $product->photo);
                                            foreach ($file_imgs as $key => $img) {
                                        ?>
                                                <li><img id="image_banner" width="150px;" height="150px" src="/upload/admin/product/photos/{{$img}}"></li>
                                        <?php
                                                # code...
                                            }

                                        ?>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Description *</label>
                                <textarea class="form-control" id="article-ckeditor" name="description">{{$product->description}}</textarea>
                                @if($errors->has('description'))
                                    <p class="help-block">
                                        {{ $errors->first('description') }}
                                    </p>
                                @endif
                            </div>        
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Tag</label>
                                <input class="form-control" placeholder=""  name="tag" type="text" id="tag" value="{{$product->tags}}">
                                @if($errors->has('tag'))
                                    <p class="help-block">
                                        {{ $errors->first('tag') }}
                                    </p>
                                @endif
                            </div>        
                        </div>

                        {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        @if(isset($data_product))
                        <form action="" method="" enctype="multipart/form-data">
                            <h3>Data</h3>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Subtract Stock</label>
                                    <select id="subtract" name="subtract" class="form-control placeholder-select">
                                        @if($data_product['subtract_stock'] == "Yes")
                                            <option value="1" selected>Yes</option>
                                            <option value="2">No</option>
                                        @else
                                            <option value="1">Yes</option>
                                            <option value="2" selected>No</option>
                                        @endif
                                    </select>
                                    <p style="color:red" class="errors data_subtract"></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Track Inventory</label>
                                    <select id="inventory_edit" name="inventory_edit" class="form-control placeholder-select">
                                        @if($data_product['track_inventory'] == "Track")
                                            <option value="1" selected>Track</option>
                                            <option value="2">Do not track</option>
                                        @else
                                            <option value="1">Track</option>
                                            <option value="2" selected>Do not track</option>
                                        @endif
                                    </select>
                                    <p style="color:red" class="errors data_inventory"></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Alert - Stock Level</label>
                                    <input class="form-control" placeholder=""  name="alert" type="text" id="alert" value="{{$data_product->alert_stock_level}}" >
                                    <p style="color:red" class="errors data_alert"></p>
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Youtube Video</label>
                                    <input class="form-control" placeholder=""  name="youtube" type="text" id="youtube" value="{{$data_product->youtube_video}}">
                                    <p style="color:red" class="errors data_youtube"></p>
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Date Available</label>
                                    <input class="form-control" placeholder="dd/mm/yyyy"  name="date" type="text" id="date_available" value="{{$data_product->date_available}}">
                                    <p style="color:red" class="errors data_date_available"></p>
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Sort Order</label>
                                    <input class="form-control" placeholder=""  name="sort_order" type="text" id="sort_order" value="{{$data_product->sort_order}}">
                                    <p style="color:red" class="errors data_sort_order"></p>
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Featured Product</label>
                                    <select id="featured" name="featured" class="form-control placeholder-select">
                                        @if($data_product['featured_product'] == "Yes")
                                            <option value="1" selected>Yes</option>
                                            <option value="2">No</option>
                                        @else
                                            <option value="1">Yes</option>
                                            <option value="2" selected>No</option>
                                        @endif
                                    </select>
                                    <p style="color:red" class="errors data_featured"></p>
                                </div>        
                            </div>
                            {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger data_edit']) !!}
                            {!! Form::close() !!}
                        </form>
                        @else
                            <h3>Data not found!</h3>
                        @endif
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        @if(isset($seo_product))
                            <form action="" method="" enctype="multipart/form-data">
                                <h3>SEO</h3>

                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        <label for="name" class="control-label">Meta Tag Title</label>
                                        <input class="form-control" placeholder=""  name="meta_tag_title" type="text" id="meta_tag_title" value="{{$seo_product->meta_tag_title}}" >
                                        <p style="color:red" class="errors meta_tag_title"></p>
                                    </div>        
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        <label for="name" class="control-label">Meta Tag Description</label>
                                        <textarea rows="7" class="form-control" id="meta_tag_description" name="meta_tag_description">{{$seo_product->meta_tag_description}}</textarea>
                                    </div>        
                                </div>

                                {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger seo_edit']) !!}
                                {!! Form::close() !!}
                            </form>
                        @else
                            <h3>Data not found!</h3>
                        @endif
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <h3>Menu 3</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div id="menu4" class="tab-pane fade">
                        <h3>Menu 3</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div id="menu5" class="tab-pane fade">
                        <h3>Menu 3</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
        $(function() {
            $( "#date_available" ).datepicker();
            // $( "#datepicker-12" ).datepicker("setDate", date());
         });
        $(document).ready(function(){
            $( "#inventory_edit" ).change(function() {
                var value = $( this ).val();
                if(value == 2){
                    $('#alert').attr({
                        'disabled': 'true',
                        'value': '0'
                    });
                }else{
                    $('#alert').removeAttr('disabled');
                    <?php 
                        if(isset($data_product)){
                    ?>
                        $('#alert').attr({
                            'value': '{{$data_product->alert_stock_level}}'
                        });
                    <?php
                        }
                    ?>
                }
            });

            $('.data_edit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'type' : 'POST',
                    'url' : 'data_edit',
                    'data' : {
                        product:$('#product').val(),
                        subtract:$('#subtract').val(),
                        inventory:$('#inventory_edit').val(),
                        alert:$('#alert').val(),
                        youtube:$('#youtube').val(),
                        date_available:$('#date_available').val(),
                        length:$('#length').val(),
                        width:$('#width').val(),
                        height:$('#height').val(),
                        length_class:$('#length_class').val(),
                        weight:$('#weight').val(),
                        weight_class:$('#weight_class').val(),
                        sort_order:$('#sort_order').val(),
                        featured:$('#featured').val(),
                        enable_cod:$('#enable_cod').val(),
                    },
                    success: function(data){
                        console.log(data);
                        if(data.error == true){
                            $('.errors').hide();
                            if(data.messages.subtract != undefined){
                                $('.data_subtract').show().text(data.messages.subtract[0]);
                            }
                            if(data.messages.inventory != undefined){
                                $('.data_inventory').show().text(data.messages.inventory[0]);
                            }
                            // if(data.messages.alert != undefined){
                            //     $('.data_alert').show().text(data.messages.alert[0]);
                            // }
                            // if(data.messages.youtube != undefined){
                            //     $('.data_youtube').show().text(data.messages.youtube[0]);
                            // }
                            if(data.messages.date_available != undefined){
                                $('.data_date_available').show().text(data.messages.date_available[0]);
                            }
                            if(data.messages.length != undefined){
                                $('.data_length').show().text(data.messages.length[0]);
                            }
                            if(data.messages.width != undefined){
                                $('.data_width').show().text(data.messages.width[0]);
                            }
                            if(data.messages.height != undefined){
                                $('.data_height').show().text(data.messages.height[0]);
                            }
                            if(data.messages.length_class != undefined){
                                $('.data_length_class').show().text(data.messages.length_class[0]);
                            }
                            if(data.messages.weight != undefined){
                                $('.data_weight').show().text(data.messages.weight[0]);
                            }
                            if(data.messages.weight_class != undefined){
                                $('.data_weight_class').show().text(data.messages.weight_class[0]);
                            }
                            if(data.messages.sort_order != undefined){
                                $('.data_sort_order').show().text(data.messages.sort_order[0]);
                            }
                            if(data.messages.featured != undefined){
                                $('.data_featured').show().text(data.messages.featured[0]);
                            }
                            if(data.messages.enable_cod != undefined){
                                $('.data_enable_cod').show().text(data.messages.enable_cod[0]);
                            }
                            if(data.messages.product != undefined){
                                $('.data_product').show().text(data.messages.product[0]);
                            }

                        }else{
                            $('.errors').hide();
                            // if(data.messages.registerMess != undefined){
                            //     $('.registerMess').show().text(data.messages.registerMess[0]);
                            // }
                            console.log('ok');
                        }
                    }
                });
            });
            var value = $('#inventory_edit').val();
            if(value == 2){
                $('#alert').attr({
                    'disabled': 'true',
                    'value': '0'
                });
            }
            
            $('.seo_edit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'type' : 'POST',
                    'url' : 'seo_edit',
                    'data' : {
                        meta_tag_title:$('#meta_tag_title').val(),
                        meta_tag_description:$('#meta_tag_description').val(),
                    },
                    success: function(data){
                        if(data.error == true){
                            $('.errors').hide();
                            if(data.messages.meta_tag_title != undefined){
                                $('.meta_tag_title').show().text(data.messages.meta_tag_title[0]);
                            }

                        }else{
                            $('.errors').hide();
                        }
                    }
                });
            });
        });
    </script>    
@endsection
