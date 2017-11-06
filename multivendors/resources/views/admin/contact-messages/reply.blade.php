@extends('layouts.app')

@section('content')
    <h3 class="page-title">Contact Messages</h3>
    <form method="POST" action="{{ URL::to('admin/contact_message/'.$contact_message->id).'/reply' }}" >
    <!-- <input type="hidden" name="_token" value="{{csrf_token()}}" /> -->
        {{ csrf_field() }}
        <div class="panel panel-default">
            <div class="panel-heading">
                Reply Messages
            </div>
            
            <div class="panel-body">

                <div class="row">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Reply Message</th>
                            <td>
                                <textarea class="form-control" id="article-ckeditor" name="content" value="{{old('content')}}"></textarea>
                                @if($errors->has('content'))
                                    <p class="help-block">
                                        {{ $errors->first('content') }}
                                    </p>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <div style="text-align: center;">
                        <a class="btn btn-primary btn-labeled fa fa-refresh pro_list_btn" href="{{ URL::to('admin/contact_message/' . $contact_message->id) }}">
                            View Original Message
                        </a>
                        <a>
                            <button class="btn btn-success btn-labeled fa fa-reply" type="submit">
                                <span style="font-size: 14px;padding: 0 5px;">Reply</span>
                            </button>
                        </span>
                    </div>
                </div>
                
            </div>
        </div>

    </form>

@endsection
@section('javascript')
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>  
@endsection

