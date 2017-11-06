@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-testimonials.title')</h3>
    @can('testimonial_create')
    <p>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($testimonials) > 0 ? 'datatable' : '' }} @can('testimonial_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('testimonial_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>S. No.</th>
                        <th>@lang('quickadmin.manage-testimonials.fields.name')</th>
                        <th>@lang('quickadmin.manage-testimonials.fields.action')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($testimonials) > 0)
                        @foreach ($testimonials as $key => $testimonial)
                            <tr data-entry-id="{{ $testimonial->id }}">
                                @can('testimonial_delete')
                                    <td></td>
                                @endcan
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $testimonial->name }}</td>
                                <td>
                                    @can('testimonial_view')
                                    <a href="{{ route('admin.testimonials.show',[$testimonial->id]) }}" class="btn btn-xs btn-info" title="" data-toggle="tooltip" data-original-title="View">
                                        <i class="fa fa-list-alt"></i>
                                    </a>
                                    @endcan
                                    @can('testimonial_edit')
                                    <a href="{{ route('admin.testimonials.edit',[$testimonial->id]) }}" class="btn btn-xs btn-primary" title="" data-toggle="tooltip" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('testimonial_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.testimonials.destroy', $testimonial->id])) !!}
                                    {!! Form::button(trans(''), array('class' => 'btn btn-xs btn-danger fa fa-trash','title' => '','data-toggle' => 'tooltip','data-original-title' => 'Delete','type' => 'submit')) !!}
                                    {!! Form::close() !!}
                                    @endcan
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


@stop

@section('javascript') 
    <script>
        @can('testimonial_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
        @endcan
    </script>
@endsection