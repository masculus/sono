{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Users list')

<!-- Changed by Yuris to support Materialize CSS -->

{{-- vendors styles --}}
@section('vendor-style')

@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

{{-- page content --}}
@section('content')

<section class="users-list-wrapper section @if(Auth::user()->is_superuser == 0) {{'d-none'}} @endif">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text">{{ isset($title) ? $title : trans('devices.model_plural') }}</h5>
        </div>
        <!-- "Go Up" button -->
        <div class="col s3 m3 l3 right-align">
            <a href="{{ route('devices.device.index') }}" class="btn-floating btn waves-effect waves-light blue darken-2">
                <i class="material-icons" title="{{ trans('devices.create') }}">arrow_upward</i>
            </a>
        </div>
    </div>


    <form method="POST" action="{{ route('devices.device.update', $device->Device_ID) }}" 
        id="edit_device_form" name="edit_device_form" accept-charset="UTF-8" class="form-horizontal">
    <div class="row">
        <!-- Edit Form -->
        <div class="col s8 m8 l8">
            <div class="card-panel mb-6">

            <!-- Errors here, if present -->
            @if ($errors->any())
                <ul class="msg msg-alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {{ csrf_field() }}
 
            <input name="_method" type="hidden" value="PUT">

            @include ('devices.form', [
                'device' => $device,
            ])


            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="row">
        <div class="col s6 m6 l6 left-align">
            <input class="btn btn-primary green" type="submit" value="{{ trans('devices.update') }}">
            </form>
            <a href="{{ route('devices.device.index') }}" class="btn waves-effect waves-light blue darken-2">{{ trans('locale.cancels') }}</a>
        </div>
        
        <div class="col s2 m2 l2 right-align">
            <form method="POST" action="{!! route('devices.device.destroy', $device->Device_ID) !!}" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="_method" value="DELETE" type="hidden">
                <input class="btn btn-primary red" onclick="return confirm(&quot;{{ trans('devices.confirm_delete') }}&quot;)" type="submit" value="{{ trans('locale.deletes') }}">
            </form>
        </div>
        
    </div>
   
</section>

@endsection
