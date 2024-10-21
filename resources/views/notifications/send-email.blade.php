@extends('layouts.layout')
@section('title','Send Email')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                @lang('notification.send_email')

                </div>
                <div class="card-body">
                    <form action="" method="">
                        <div class="form-group">
                            <label for="user">@lang('notification.users')</label>
                            <select name="user"  class="form-control" id="user">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="text">@lang('notification.email_type')</label>
                            <select name="test" class="form-control" id="">
                                @foreach($emailTypes as $key=>$type)
                                    <option value="{{$key}}">{{$type}}</option>
                                @endforeach


                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">@lang('notification.send')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

