@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-banners.title')</h3>
    @can('banner_create')
    <p>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($banners) > 0 ? 'datatable' : '' }} @can('banner_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('banner_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>S. No.</th>
                        <th>@lang('quickadmin.manage-banners.fields.title')</th>
                        <th>@lang('quickadmin.manage-banners.fields.banner')</th>
                        <th>@lang('quickadmin.manage-banners.fields.action')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($banners) > 0)
                        @foreach ($banners as $key => $banner)
                            <tr data-entry-id="{{ $banner->id }}">
                                @can('banner_delete')
                                    <td></td>
                                @endcan
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $banner->title }}</td>
                                @if($banner->image != null)
                                    <td><img width="70px" src="/upload/admin/banner/{{$banner-> image}}"></td>
                                @else
                                    <td></td>
                                @endif
                                <td>
                                    @can('banner_view')
                                    <!-- <a href="{{ route('admin.banners.show',[$banner->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a> -->
                                    <a href="{{ route('admin.banners.show',[$banner->id]) }}" class="btn btn-xs btn-info" title="" data-toggle="tooltip" data-original-title="View">
                                        <i class="fa fa-list-alt"></i>
                                    </a>
                                    @endcan
                                    @can('banner_edit')
                                    <!-- <a href="{{ route('admin.banners.edit',[$banner->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a> -->
                                    <a href="{{ route('admin.banners.edit',[$banner->id]) }}" class="btn btn-xs btn-primary" title="" data-toggle="tooltip" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('banner_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.banners.destroy', $banner->id])) !!}
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
        @can('banner_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
        @endcan
    </script>
@endsection