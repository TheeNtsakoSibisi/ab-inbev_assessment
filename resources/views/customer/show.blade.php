@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'User Profile',
    'activePage' => 'profile',
    'activeNav' => '',
])

@section('content')<div class="panel-header panel-header-sm">
    </div>
    <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Client")}}</h5>
          </div>

    <div class="jumbotron text-center">
        <p>
            <strong>Client Name:</strong> {{ $cities->name }}<br>
            <strong>Client City:</strong> {{ $cities->city_id }}
        </p>
    </div>
@endsection