@extends('layouts.app')

@section('content')
    <h3 class="page-title">Product Brand</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Brand Name</th>
                            <td>{{ $brand->name }}</td>
                        </tr>
                        <tr>
                            <th>Brand Logo</th>
                            <td><img width="200px;" src="{{url('./upload/admin/brand/'.$brand->logo)}}"></td>
                        </tr>
                        <tr>
                            <th>Brand Slug</th>
                            <td>{{ $brand->slug}}</td>
                        </tr>
                        <tr>
                            <th>Brand Description</th>
                            <td>{{ $brand->description}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.brands.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop