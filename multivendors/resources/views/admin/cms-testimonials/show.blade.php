@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-testimonials.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Testimonial By</th>
                            <td>{{ $cms_testimonial->name }}</td>
                        </tr>
                        <tr>
                            <th>Testimonial Image</th>
                            <td><img src="/upload/admin/testimonial/{{$cms_testimonial->image}}"></td>
                        </tr>
                        <tr>
                            <th>Testimonial Location</th>
                            <td>{{ $cms_testimonial->location}}</td>
                        </tr>
                        <tr>
                            <th>Testimonial Text</th>
                            <td>{{ $cms_testimonial->text}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop