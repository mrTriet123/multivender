
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Products Management</h3>
   

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
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
                     {!! Form::open(['method' => 'POST', 'route' => ['admin.products.store'],'enctype'=>'multipart/form-data']) !!}
                        <h3>General</h3>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Product Shop *</label>
                                <select id="shops" name="shops" class="form-control placeholder-select">
                                    <option value="">Please select</option>
                                    @foreach($shops as $shop)
                                        @if (old('shops') == $shop->id)
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
                                <label for="name" class="control-label">Price*</label>
                                <input class="form-control" placeholder=""  name="price" type="text" id="price" value="{{old('price')}}">
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
                                <input class="form-control" placeholder=""  name="quantity" type="text" id="quantity" value="1">
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
                                <input class="form-control" placeholder=""  name="mini_quantity" type="text" id="mini_quantity" value="1">
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
                                        @if (old('brands') == $brand->id)
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
                                              <option value="{{$category->id}}">{{$pre.$category->name}}</option>
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
                                <input class="form-control" placeholder=""  name="model" type="text" id="model" value="">
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
                                <input class="form-control" placeholder=""  name="sku" type="text" id="sku" value="">
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
                                    <option value="1">New</option>
                                    <option value="2">Used</option>
                                    <option value="3">Refurbished</option>
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
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
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

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="name" class="control-label">Description *</label>
                                <textarea class="form-control" id="article-ckeditor" name="description"></textarea>
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
                                <input class="form-control" placeholder=""  name="tag" type="text" id="tag" value="">
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
                        <form action="" method="" enctype="multipart/form-data">
                            <h3>Data</h3>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Products</label>
                                    <select id="product" name="product" class="form-control placeholder-select">
                                        <option value="">Please select</option>
                                        @foreach($data_products as $dt_product)
                                        <option value="{{$dt_product->id}}">{{$dt_product->name}}</option>
                                        @endforeach
                                    </select>
                                    <p style="color:red" class="errors data_product"></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Subtract Stock</label>
                                    <select id="subtract" name="subtract" class="form-control placeholder-select">
                                        <option value="">Please select</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <p style="color:red" class="errors data_subtract"></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Track Inventory</label>
                                    <select id="inventory" name="inventory" class="form-control placeholder-select">
                                        <option value="">Please select</option>
                                        <option value="1">Track</option>
                                        <option value="2">Do not track</option>
                                    </select>
                                    <p style="color:red" class="errors data_inventory"></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Alert - Stock Level</label>
                                    <input class="form-control" placeholder=""  name="alert" type="text" id="alert" value="0" >
                                    <p style="color:red" class="errors data_alert"></p>
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Youtube Video</label>
                                    <input class="form-control" placeholder=""  name="youtube" type="text" id="youtube" value="">
                                    <p style="color:red" class="errors data_youtube"></p>
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Date Available</label>
                                    <input class="form-control" placeholder="dd/mm/yyyy"  name="date" type="text" id="date_available" value="">
                                    <p style="color:red" class="errors data_date_available"></p>
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Dimensions (L x W x H)</label>
                                    <div style="width: 100%;" class="row">
                                        <div class="col-xs-4">
                                            <input class="form-control" placeholder="Length"  name="length" type="text" id="length" value="">
                                            <p style="color:red" class="errors data_length"></p>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" placeholder="Width"  name="width" type="text" id="width" value="">
                                            <p style="color:red" class="errors data_width"></p>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" placeholder="Height"  name="height" type="text" id="height" value="">
                                            <p style="color:red" class="errors data_height"></p>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Length Class:</label>
                                    <select id="length_class" name="length_class" class="form-control placeholder-select">
                                        <option value="">Please select</option>
                                        <option value="1">Centimeter</option>
                                        <option value="2">Millimeters</option>
                                        <option value="3">Inch</option>
                                    </select>
                                    <p style="color:red" class="errors data_length_class"></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Weight</label>
                                    <input class="form-control" placeholder=""  name="weight" type="text" id="weight" value="">
                                    <p style="color:red" class="errors data_weight"></p>
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Weight Class:</label>
                                    <select id="weight_class" name="weight_class" class="form-control placeholder-select">
                                        <option value="">Please select</option>
                                        <option value="1">Kilogram</option>
                                        <option value="2">Grams</option>
                                        <option value="3">Pounds</option>
                                        <option value="4">Ounce</option>
                                        <option value="5">Litres</option>
                                        <option value="6">Mili Litres</option>
                                    </select>
                                    <p style="color:red" class="errors data_weight_class"></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Sort Order</label>
                                    <input class="form-control" placeholder=""  name="sort_order" type="text" id="sort_order" value="1">
                                    <p style="color:red" class="errors data_sort_order"></p>
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Featured Product</label>
                                    <select id="featured" name="featured" class="form-control placeholder-select">
                                        <option value="">Please select</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <p style="color:red" class="errors data_featured"></p>
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Enable COD</label>
                                    <select id="enable_cod" name="enable_cod" class="form-control placeholder-select">
                                        <option value="">Please select</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <p style="color:red" class="errors data_enable_cod"></p>
                                </div>        
                            </div>
                            {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger data_submit']) !!}
                            {!! Form::close() !!}
                        </form>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <form action="" method="" enctype="multipart/form-data">
                            <h3>SEO</h3>
                            
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Products</label>
                                    <select id="seo_products" name="seo_products" class="form-control placeholder-select">
                                        <option value="">Please select</option>
                                        @foreach($product_seo as $pro_seo)
                                        <option value="{{$pro_seo->id}}">{{$pro_seo->name}}</option>
                                        @endforeach
                                    </select>
                                    <p style="color:red" class="errors seo_products"></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Meta Tag Title</label>
                                    <input class="form-control" placeholder=""  name="meta_tag_title" type="text" id="meta_tag_title" value="" >
                                    <p style="color:red" class="errors meta_tag_title"></p>
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label for="name" class="control-label">Meta Tag Description</label>
                                    <textarea rows="7" class="form-control" id="meta_tag_description" name="meta_tag_description"></textarea>
                                </div>        
                            </div>

                            {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger seo_create']) !!}
                            {!! Form::close() !!}
                        </form>
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
        // CKEDITOR.replace( 'meta_tag_description' );
        $(function() {
            $( "#date_available" ).datepicker();
            // $( "#datepicker-12" ).datepicker("setDate", date());
         });
        $(document).ready(function(){
            $( "#inventory" ).change(function() {
                var value = $( this ).val();
                if(value == 2){
                    $('#alert').attr({
                        'disabled': 'true',
                        'value': '0'
                    });
                }else{
                    $('#alert').removeAttr('disabled');
                }
            });

            $('.data_submit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'type' : 'POST',
                    'url' : 'data_product',
                    'data' : {
                        product:$('#product').val(),
                        subtract:$('#subtract').val(),
                        inventory:$('#inventory').val(),
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
                        }
                    }
                });
            });

            $('.seo_create').click(function(e){
                e.preventDefault();
                // var desc = CKEDITOR.instances['myTextarea'].getData();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'type' : 'POST',
                    'url' : 'seo_product',
                    'data' : {
                        seo_products:$('#seo_products').val(),
                        meta_tag_title:$('#meta_tag_title').val(),
                        meta_tag_description:$('#meta_tag_description').val(),
                    },
                    success: function(data){
                        if(data.error == true){
                            $('.errors').hide();
                            if(data.messages.seo_products != undefined){
                                $('.seo_products').show().text(data.messages.seo_products[0]);
                            }
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