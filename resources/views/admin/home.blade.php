@extends('layouts.admin-panel')
@section('title','Admin Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-body">
                    <h4>Admin Dashboard</h4><hr>
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">{{ Auth::guard('admin')->user()->name }}</td>
                                    <td>{{ Auth::guard('admin')->user()->email }}</td>
                                    <td>{{ Auth::guard('admin')->user()->phone }}</td>
                                    <td>
                                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                        <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf</form>
                                    </td>
                                </tr>
                            </tbody>
                    </table>

                </div>
            </div>
                
        </div>
    </div>
@endsection
