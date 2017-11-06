
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Shops Management</h3>
    {!! Form::model($shop, ['method' => 'PUT', 'route' => ['admin.shops.update',$shop->id],'enctype'=>'multipart/form-data']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <h4>Basic Information</h4>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Name*</label>
                    <input class="form-control" placeholder=""  name="name" type="text" id="name" value="{{$shop->name}}">
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>        
            </div>
            <div class="row">
                <div class="col-xs-12 form-group ">
                    <label class="control-label" for="fileInput">Shop Logo</label>
                    <p>
                        <img width="100px;" src="{{url('./upload/admin/shop/logo/'.$shop->logo)}}">
                    </p>
                    <div class="controls">
                        <input class="input-file uniform_on form-control" id="fileInput" type="file" name="logo">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group ">
                    <label class="control-label" for="fileInput">Shop Banner</label>
                    <p>
                        <img width="200px;" src="{{url('./upload/admin/shop/banner/'.$shop->banner)}}">
                    </p>
                    <div class="controls">
                        <input class="input-file uniform_on form-control" id="fileInput" type="file" name="banner">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group ">
                    <label class="control-label" for="fileInput">Active</label>
                    <div class="controls">
                        <select id="shop-active" name="active" class="form-control placeholder-select">
                            @if($shop-> active == "Yes")
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
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="article-ckeditor">Discription*</label>
                    <textarea class="form-control" id="article-ckeditor" name="description">{{$shop->description}}</textarea>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group ">
                    <label class="control-label" for="fileInput">Featured Shop</label>
                    <div class="controls">
                        <select id="featured-shop" name="featured-shop" class="form-control placeholder-select">
                            @if($shop-> featured_shop == "Yes")
                                <option value="1" selected="">Yes</option>
                                <option value="2" >No</option>
                            @else
                                <option value="1" >Yes</option>
                                <option value="2" selected="">No</option>
                            @endif
                            
                        </select>
                        @if($errors->has('featured-shop'))
                            <p class="help-block">
                                {{$errors->first('featured-shop')}}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <h4>Shop Address (Please Provide Address And Contact Person Information Of Your Shop.)</h4>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Contact Person Name*</label>
                    <input class="form-control" placeholder=""  name="person-name" type="text" id="name" value="{{$shop->name}}" disabled="true">
                    @if($errors->has('person-name'))
                        <p class="help-block">
                            {{ $errors->first('person-name') }}
                        </p>
                    @endif
                </div>        
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Phone*</label>
                    <input class="form-control" placeholder=""  name="phone" type="text" id="phone" value="{{$shop->phone}}">
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                </div>        
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Address*</label>
                    <input class="form-control" placeholder=""  name="address" type="text" id="address" value="{{$shop->address}}">
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>        
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">City*</label>
                    <input class="form-control" placeholder=""  name="city" type="text" id="city" value="{{$shop->city}}">
                    @if($errors->has('city'))
                        <p class="help-block">
                            {{ $errors->first('city') }}
                        </p>
                    @endif
                </div>        
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Postcode*</label>
                    <input class="form-control" placeholder=""  name="postcode" type="text" id="postcode" value="{{$shop->postcode}}">
                    @if($errors->has('postcode'))
                        <p class="help-block">
                            {{ $errors->first('postcode') }}
                        </p>
                    @endif
                </div>        
            </div>

            <div class="row">
                <div class="col-xs-12 form-group ">
                    <label class="control-label" for="fileInput">Country</label>
                    <div class="controls">
                        <select id="country" name="country" class="form-control placeholder-select">
                            @foreach($countries as $country)
                                <option
                                    @if($shop->country_id == $country->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
<!--                         @if($errors->has('country'))
                            <p class="help-block">
                                {{$errors->first('country')}}
                            </p>
                        @endif -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group ">
                    <label class="control-label" for="fileInput">State</label>
                    <div class="controls">
                        <select id="states" name="states" class="form-control placeholder-select">
                            @foreach($states as $state)
                                <option
                                    @if($shop->state_id == $state->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                            
                        </select>
                        <!-- @if($errors->has('states'))
                            <p class="help-block">
                                {{$errors->first('states')}}
                            </p>
                        @endif -->
                    </div>
                </div>
            </div>

            <h4>Section 2: Shop Policies (Optional)</h4>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="payment_policy">Payment Policy</label>
                    <textarea class="form-control" id="payment_policy" name="payment_policy">{{$shop->payment_policy}}</textarea>
                    <!-- @if($errors->has('payment_policy'))
                        <p class="help-block">
                            {{ $errors->first('payment_policy') }}
                        </p>
                    @endif -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="delivery_policy">Delivery Policy</label>
                    <textarea class="form-control" id="delivery_policy" name="delivery_policy">{{$shop->delivery_policy}}</textarea>
                    <!-- @if($errors->has('delivery_policy'))
                        <p class="help-block">
                            {{ $errors->first('delivery_policy') }}
                        </p>
                    @endif -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="refund_policy">Refund Policy</label>
                    <textarea class="form-control" id="refund_policy" name="refund_policy">{{$shop->refund_policy}}</textarea>
                    <!-- @if($errors->has('refund_policy'))
                        <p class="help-block">
                            {{ $errors->first('refund_policy') }}
                        </p>
                    @endif -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="additional_information">Additional Information</label>
                    <textarea class="form-control" id="additional_information" name=" additional_information">{{$shop->additional_information}}</textarea>
                    <!-- @if($errors->has('additional_information'))
                        <p class="help-block">
                            {{ $errors->first('additional_information') }}
                        </p>
                    @endif -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="seller_information">Seller Information</label>
                    <textarea class="form-control" id="seller_information" name="seller_information">{{$shop->seller_information}}</textarea>
                    <!-- @if($errors->has('seller_information'))
                        <p class="help-block">
                            {{ $errors->first('seller_information') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <h4>Section 3: Shop SEO Information (Optional)</h4>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Meta Tag Title</label>
                    <input class="form-control" placeholder=""  name="meta_tag_title" type="text" id="meta_tag_title" value="{{$shop->meta_tag_title}}">
                    <!-- @if($errors->has('meta_tag_title'))
                        <p class="help-block">
                            {{ $errors->first('meta_tag_title') }}
                        </p>
                    @endif -->
                </div>        
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="name" class="control-label">Meta Tag Keywords</label>
                    <input class="form-control" placeholder=""  name="meta_tag_keywords" type="text" id="meta_tag_keywords" value="{{$shop->meta_tag_keywords}}">
                    <!-- @if($errors->has('meta_tag_keywords'))
                        <p class="help-block">
                            {{ $errors->first('meta_tag_keywords') }}
                        </p>
                    @endif -->
                </div>        
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="meta_tag_description">Meta Tag Description</label>
                    <textarea class="form-control" id=" meta_tag_description" name="meta_tag_description">{{$shop->  meta_tag_description}}</textarea>
                    <!-- @if($errors->has('  meta_tag_description'))
                        <p class="help-block">
                            {{ $errors->first(' meta_tag_description') }}
                        </p>
                    @endif -->
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
        CKEDITOR.replace( 'payment_policy' );
        CKEDITOR.replace( 'delivery_policy' );
        CKEDITOR.replace( 'refund_policy' );
        CKEDITOR.replace( 'additional_information');
        CKEDITOR.replace( 'seller_information' );   
        CKEDITOR.replace( 'meta_tag_description' );


        $(document).ready(function () {
            // body...
            $('#country').change(function(){
                $.ajax({
                    // body...
                    'type':'get',
                    'url':'states',
                    'data':{
                        country_id : $('#country').val(),
                    },
                    success:function(data){
                        console.log(data);
                        $('#states').html(data);
                    },
                    error:function(data){
                        $('#states').html('<option>Data empty!</option>');
                    }
                })
            });
        })
    </script>  
@endsection