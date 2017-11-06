@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-fqas.title')</h3>
    @can('page_create')
    <p>
        <a href="{{ route('admin.fqas.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($fqas) > 0 ? 'datatable' : '' }} @can('page_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('page_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>S. No.</th>
                        <th>@lang('quickadmin.manage-fqas.fields.name')</th>
                        <th>@lang('quickadmin.manage-fqas.fields.category')</th>
                        <th>@lang('quickadmin.manage-fqas.fields.action')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($fqas) > 0)
                        @foreach ($fqas as $key => $fqa)

                            <tr data-entry-id="{{ $fqa->id }}">
                                @can('page_delete')
                                    <td></td>
                                @endcan
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $fqa->question }}</td>
                                <td>{{ $fqa->fqacategory->name }}</td>
                                <td>
                                    @can('page_view')
                                    <!-- <a href="{{ route('admin.fqas.show',[$fqa->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a> -->
                                    <a href="{{ route('admin.fqas.show',[$fqa->id]) }}" class="btn btn-xs btn-info" title="" data-toggle="tooltip" data-original-title="View">
                                        <i class="fa fa-list-alt"></i>
                                    </a>
                                    @endcan
                                    @can('page_edit')
                                    <!-- <a href="{{ route('admin.fqas.edit',[$fqa->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a> -->
                                    <a href="{{ route('admin.fqas.edit',[$fqa->id]) }}" class="btn btn-xs btn-primary" title="" data-toggle="tooltip" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('page_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.fqas.destroy', $fqa->id])) !!}
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
        @can('page_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
        @endcan
    </script>
@endsection