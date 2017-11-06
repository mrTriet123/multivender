@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-banners.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Banner Title</th>
                            <td>{{ $cms_banner->title }}</td>
                        </tr>
                        <tr>
                            <th>Banner Type</th>
                            <td>{{ $cms_banner->typebanner->type }}</td>
                        </tr>
                        <tr>
                            <th>Banner Image</th>
                            <td><img width="200px;" src="/upload/admin/banner/{{$cms_banner->image}}"></td>
                        </tr>
                        <tr>
                            <th>Banner HTML</th>
                            <td>{{ $cms_banner->html}}</td>
                        </tr>
                        <tr>
                            <th>Banner URL</th>
                            <td>{{ $cms_banner->url}}</td>
                        </tr>
                        <tr>
                            <th>Open Link in New Tab</th>
                            <td>{{ $cms_banner->openlink}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.banners.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop