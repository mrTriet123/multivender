@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.csm.fqas.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>FAQ Category</th>
                            <td>{{ $cms_fqa->fqacategory->name }}</td>
                        </tr>
                        <tr>
                            <th>Question Title</th>
                            <td>{{ $cms_fqa->question }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $cms_fqa->description}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.pages.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop