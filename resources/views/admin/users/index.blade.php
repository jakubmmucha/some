@extends('layouts.admin')

@section('content')


@if(Session::has('deleted_user'))
<p>{{ session('deleted_user') }} </p>

@endif
    <h1>Users</h1>
    <div class="container-fluid">
            <h2></h2>
            <p></p>
            <table class="table">
              <thead>
                <tr>
                  <th class="danger">Id</th>
                  <th>Photo</th>
                  <th class="success">Name</th>
                  <th class="active">Email</th>
                  <th class="default">Role</th>
                  <th class="danger">Status</th>
                  <th class="info">Created</th>
                  <th class="warning">Updated</th>
                </tr>
              </thead>
              @if($users)
              @foreach($users as $user)
              <tbody>
                <tr>
                  <td>{{ $user->id }}</td>
                  <td><img style="height:60px; width:60px;"src="{{ $user->photo ? asset($user->photo->file) : 'http://placehold.it/400x400'}}"></td>
                  <td><a href="{{ route('admin.users.edit',$user->id) }}">{{ $user->name }}</a></td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role ? $user->role->name: 'No role selected' }}</td>
                  <td>{{ $user->is_active==1 ?'Active':'Not Active' }}</td>
                  <td>{{ $user->created_at->diffForHumans() }}</td>
                  <td>{{ $user->updated_at->diffForHumans() }}</td>
                </tr>   
                @endforeach
                @endif   
              </tbody>
            </table>
          </div>
 
@endsection