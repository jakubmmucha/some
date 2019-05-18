@extends('layouts.admin')


@section('content')


   <h1>Jobs</h1>

<div class="container-fluid">
        
        <table class="table">
          <thead>
            <tr>
              <th class="danger">Id</th>
              <th class="info">Photo</th>
              <th class="info">Posted by</th>
              <th class="success">Category</th>
              <th class="default">Brief info</th>
              <th class="danger">Body</th>
              <th class="info">Created</th>
              <th class="warning">Updated</th>
            </tr>
          </thead>
          @if($jobs)
          @foreach($jobs as $job)
          <tbody>
            <tr>
              <td>{{ $job->id }}</td>
              <td><img style="height:100px; width:120px;"src="{{ $job->photo ? asset($job->photo->file) : 'http://placehold.it/400x400'}}"></td>
              <td><a href="{{route('admin.jobs.edit' ,$job->id)}}">{{ $job->user->name }} </td>
              <td>{{ $job->category? $job->category->name:'Uncategorised' }}</td>
              <td>{{ $job->title}}</td>
              <td>{{ $job->body}}</td>
              <td>{{ $job->created_at->diffForhumans()}}</td>
              <td>{{ $job->updated_at->diffForhumans()}}</td>
            </tr>   
            @endforeach
            @endif   
          </tbody>
        </table>
      </div>









@endsection