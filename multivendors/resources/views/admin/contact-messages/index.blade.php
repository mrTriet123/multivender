@extends('layouts.app')

@section('content')
    <h3 class="page-title">Contact Messages</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($contact_messages) > 0 ? 'datatable' : '' }} @can('contact_messages_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('contact_messages_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>S. No.</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($contact_messages) > 0)
                        @foreach ($contact_messages as $key => $con_mes)
                            <tr data-entry-id="{{ $con_mes->id }}">
                                @can('testimonial_delete')
                                    <td></td>
                                @endcan
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $con_mes->name }}</td>
                                <td>{{ $con_mes->subject }}</td>
                                <td>{{ $con_mes->created_at }}</td>
                                <td>
                                    @can('contact_messages_view')
                                    <a href="contact_message/{{$con_mes->id}}" class="btn btn-xs btn-info" title="" data-toggle="tooltip" data-original-title="View">
                                        <i class="fa fa-list-alt"></i>
                                    </a>
                                    @endcan
                                    <a href="contact_message/{{$con_mes->id}}/delete" class="btn btn-xs btn-danger" title="" data-toggle="tooltip" data-original-title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
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