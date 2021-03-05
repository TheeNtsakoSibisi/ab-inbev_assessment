@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Client Profile',
    'activePage' => 'client',
    'activeNav' => '',
])

@section('content')
<div class="panel-header panel-header-sm">
    </div>
    <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Client Details")}}</h5>
          </div>
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Client Name</th>
              <th scope="col">Client City</th>
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($client ?? '' as $client ?? '')
            <tr>
              <th scope="row">{{$client ?? ''->id}}</th>
              <td><a href="/client/{{$client ?? ''->id}}">{{$client ?? ''->name}}</a></td>
              <td>{{$client ?? ''->city}}</td>
              <td>{{$client ?? ''->created_at->toFormattedDateString()}}</td>
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('client/' . $client ?? ''->id . '/edit') }}">
                    <button type="button" class="btn btn-warning">Edit</button>
                  </a>&nbsp;
                  <form action="{{url('client', [$client ?? ''->id])}}" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="submit" class="btn btn-danger" value="Delete"/>
            </form>
              </div>
      </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
@endsection
