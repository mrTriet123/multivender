@extends('layouts.app')

@section('content')
    <h3 class="page-title">Products Management</h3>
    @can('brand_create')
    <p>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($products) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Shop</th>
                        <th>Sold</th>
                        <th>Available</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Commission</th>
                        <th>Active</th>
                        <th width="10%">Acction</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $key => $product)
                            <tr data-entry-id="{{ $product->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->shop->name}}</td>
                                <td>0</td>
                                <td>{{$product->quantity}}</td>
                                <td>${{number_format($product->price,2)}}</td>
                                <td><?php
                                        $date = $product->created_at;
                                        echo date("F d,Y",
                                            strtotime($date)
                                        );
                                    ?>      
                                </td>
                                <td>${{number_format(($product->price)*3/50,2)}}</td>
                                <td>{{$product->status}}</td>
                                <td>
                                    @can('product_view')
                                    <a href="{{ route('admin.products.show',[$product->id]) }}" class="btn btn-xs btn-info" title="" data-toggle="tooltip" data-original-title="View">
                                        <i class="fa fa-list-alt"></i>
                                    </a>
                                    @endcan
                                    @can('brand_edit')
                                    <a href="{{ route('admin.products.edit',[$product->id]) }}" class="btn btn-xs btn-primary" title="" data-toggle="tooltip" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('product_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.products.destroy', $product->id])) !!}
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
    </script>
@endsection