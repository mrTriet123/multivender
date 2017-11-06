@extends('layouts.app')

@section('content')
    <h3 class="page-title">Product Brand</h3>
    @can('brand_create')
    <p>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($brands) > 0 ? 'datatable' : '' }} @can('brand_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('brand_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>S. No.</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($brands) > 0)
                        @foreach ($brands as $key => $brand)
                            <tr data-entry-id="{{ $brand->id }}">
                                @can('brand_delete')
                                    <td></td>
                                @endcan
                                <td>{{ $key + 1 }}</td>
                                <td><img width="100px;" src="{{url('./upload/admin/brand/'.$brand->logo)}}"></td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    @can('brand_view')
                                    <a href="{{ route('admin.brands.show',[$brand->id]) }}" class="btn btn-xs btn-info" title="" data-toggle="tooltip" data-original-title="View">
                                        <i class="fa fa-list-alt"></i>
                                    </a>
                                    @endcan
                                    @can('brand_edit')
                                    <a href="{{ route('admin.brands.edit',[$brand->id]) }}" class="btn btn-xs btn-primary" title="" data-toggle="tooltip" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('brand_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.brands.destroy', $brand->id])) !!}
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
        @can('brand_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
        @endcan
    </script>
@endsection