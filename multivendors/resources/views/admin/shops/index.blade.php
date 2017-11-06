@extends('layouts.app')

@section('content')
    <h3 class="page-title">Shops Management</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($shops) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Shop Owner</th>
                        <th>Name</th>
                        <th>Items</th>
                        <th>Reviews</th>
                        <th>Reports</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($shops) > 0)
                        @foreach ($shops as $key => $shop)
                            <tr data-entry-id="{{ $shop->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{$shop->user->name}}</td>
                                <td>{{$shop->name}}</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>{{$shop->active}}</td>
                                <td>
                                    @can('brand_view')
                                    <a href="{{ route('admin.shops.show',[$shop->id]) }}" class="btn btn-xs btn-info" title="" data-toggle="tooltip" data-original-title="View">
                                        <i class="fa fa-list-alt"></i>
                                    </a>
                                    @endcan
                                    @can('brand_edit')
                                    <a href="{{ route('admin.shops.edit',[$shop->id]) }}" class="btn btn-xs btn-primary" title="" data-toggle="tooltip" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('brand_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.shops.destroy', $shop->id])) !!}
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