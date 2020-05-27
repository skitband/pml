@extends('pages.layouts.master')

@section('content')
<div id="app">
    <div class="container">
        <div>
            <navbar-component />
        </div>
        <br />
        @if(Session::has('message'))
            <div class="alert alert-success callback-alert" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div>
            <order-component :orders="{{ json_encode($orders) }}" />
        </div>
    </div>
    <div>
        <drawer-component route="{{ route('orders.store') }}"/>
    </div>
</div>
@endsection