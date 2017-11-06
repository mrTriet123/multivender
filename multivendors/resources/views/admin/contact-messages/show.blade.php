@extends('layouts.app')

@section('content')
    <h3 class="page-title">Contact Messages</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <p style="font-size: 24px;text-align: center;">
                            Message From {{$contact_message->name}}
                        </p>
                        <tr>
                            <th>Name</th>
                            <td>{{ $contact_message->name }}</td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td>{{ $contact_message->subject}}</td>
                        </tr>
                        <tr>
                            <th>Messages</th>
                            <td>{{ $contact_message->messages}}</td>
                        </tr>
                        <tr>
                            <th>Date & Time</th>
                            <td>{{ $contact_message->created_at}}</td>
                        </tr>
                        @if(count($reply_contact) > 0)
                        <tr>
                            <th>Reply</th>
                            <td>{{ $contact_message->replycontact->content}}</td>
                        </tr>
                        @else
                        <tr>
                            <th></th>
                            <td><a class="btn btn-success btn-xs btn-labeled fa fa-reply" href="{{$contact_message->id}}/reply"><span style="font-size: 14px;padding: 0 5px;">Reply</span></a></td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ url('admin/contact_message') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop