@extends('layouts.admin')


@section('content')


<h1> Edit Jobs</h1>
<div class="row">

        <div class="col-sm-3">

            <img src="{{$job->photo ? asset($job->photo->file) : $job->photoPlaceholder()}}"  class="img-responsive">
             
            </div>

<div class="col-sm-9">

{!! Form::model($job,['method'=>'PATCH', 'action'=> ['AdminJobsController@update',$job->id], 'files'=>true]) !!}


<div class="form-group">
      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('title', null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id',  $categories, null, ['class'=>'form-control'])!!}
    </div>

 <div class="form-group">
     {!! Form::label('photo_id', 'Photo:') !!}
     {!! Form::file('photo_id', null,['class'=>'form-control'])!!}
  </div>

 <div class="form-group">
     {!! Form::label('body', 'Description:') !!}
     {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
 </div>


 <div class="form-group">
        {!! Form::submit('Update Job', ['class'=>'btn btn-primary col-sm-3']) !!}
    </div>

    {!! Form::close() !!}


    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminJobsController@destroy', $job->id]]) !!}

         <div class="form-group">
             {!! Form::submit('Delete Job', ['class'=>'btn btn-danger col-sm-3']) !!}
         </div>
    {!! Form::close() !!}
</div>
<div class="row">


@include('includes.form_error')
</div>
@endsection