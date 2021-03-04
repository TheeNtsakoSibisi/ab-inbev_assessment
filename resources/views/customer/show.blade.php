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
              <!--<a class="btn btn-primary btn-round text-white pull-right" href="#">Add user</a>-->
            <h4 class="card-title">Clients</h4>
            <div class="col-12 mt-2">
                                        </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>City</th>
                  <!--<th>Creation date</th>-->
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
              <!--<tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Creation date</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </tfoot>-->
              @if(count($clients) > 1)
              @foreach($clients as $client)
              <tbody>
                <tr>
                    
                      
                        <td>{{$client->name}}</td>
                        <td>{{$client->city}}</td>
                        <td class="text-right">
                          <a type="button" href="{{ route('profile.edit') }}" rel="tooltip" class="btn btn-warning btn-icon btn-sm " data-original-title="" title="">
                          <i class="now-ui-icons ui-2_settings-90"></i>
                          </a>
                          <form action="{{url('UserController@destroy', [$client->id])}}" method="POST" class="pull-right">
                          <input type="hidden" name="_method" value="PUT">
                          <button class="btn btn-danger btn-icon btn-sm now-ui-icons ui-1_simple-remove"></button>
                          </form>
                        </td>
                      
                </tr>
              </tbody>
              @endforeach
              @else
                      <p>No clients Found</p>
                    @endif
            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!--<div class="alert alert-danger">
      <span>
        <b></b> This is a PRO feature!</span>
    </div>-->
    <!-- end row -->
  </div>
@endsection