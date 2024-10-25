@extends('layouts.layout')
@section('title','Send Sms')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                @lang('notification.send_sms')
                </div>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @elseif(session('failed'))
                        <div class="alert alert-danger">
                            {{session('failed')}}
                        </div>
                    @endif

                    <form action="{{route('notifications.send.sms')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="user">@lang('notification.users')</label>
                            <select name="user"  class="form-control" id="user">
                                @foreach($users as $user)
                                    <option {{old('user') == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="text">@lang('notification.text_sms')</label>
                            <textarea name="text"  class="form-control" rows="5" >{{old('text')}}</textarea>
                        </div>
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <div class="small mb-2">
                                        <li class="text-danger">{{$error}}</li>
                                    </div>
                                @endforeach

                            </ul>
                        @endif

                        <button type="submit" class="btn btn-info">@lang('notification.send')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

