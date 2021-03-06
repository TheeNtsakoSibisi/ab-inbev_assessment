
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
            <h5 class="title">{{__(" Add New Client")}}</h5>
          </div>
     <form action="ClientController@store" method="PUT">
     <!--<input type="hidden" name="_method" value="PUT">-->
     {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Client name</label>
        <input type="text" class="form-control" id="clientName"  name="name">
      </div>
      <div class="form-group">
        <label for="description">Client City</label>
        <input type="text" class="form-control" id="clientCity" name="description">
      </div>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        </div>
      </div>
    </div>
  </div>
@endsection