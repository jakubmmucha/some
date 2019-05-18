<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs;
use App\Http\Requests\JobsCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Photo;
use App\Category;
use App\Http\Requests;

class AdminJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $jobs=Jobs::all();
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        //gettin the names and id of all categories
        $categories = Category::pluck('name','id')->all();


        return view('admin.jobs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobsCreateRequest $request)
    {
        //assigning the user to request 
        $input=$request->all();
        $user = Auth::user();
        $user->jobs;

        //check if file is present and if there is the process will follow
        if($file = $request->file('photo_id')){
            //gettin the original name of the file
            $name= time() . $file->getClientOriginalName();
            //moving the file to images
            $file->move('images', $name);

            //creaating the file(photo)
            $photo=Photo::create(['file'=>$name]);
            //assinging the photo to id
            $input['photo_id']=$photo->id;
        }

        // grabing the user by creating relationship
        $user->jobs()->create($input);
        return redirect('/admin/jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //finding the post first
        $job=Jobs::findOrfail($id);
        //passing the categories
        $categories=Category::pluck('name','id')->all();




        return view('admin.jobs.edit', compact('job','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //creating the input 
        $input=$request ->all();
        //
          //check if file is present and if there is the prcess will follow
          if($file = $request->file('photo_id')){
            //gettin the original name of the file
            $name= time() . $file->getClientOriginalName();
            //moving the file to images
            $file->move('images', $name);

            //creaating the file(photo)
            $photo=Photo::create(['file'=>$name]);
            //assinging the photo to id
            $input['photo_id']=$photo->id;
        }
        //finding the user
        Auth::user()->jobs()->whereId($id)->first()->update($input);


        return redirect('/admin/jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the id of the job 
        
        $job = Jobs::findOrFail($id);
        unlink(public_path() . $job->photo->file);

        $job->delete();

        return redirect('/admin/jobs');


    }


    public function job($slug){


        $job = Jobs::findBySlugOrFail($slug);

        $comments = $job->comments()->whereIsActive(1)->get();


        return view('job', compact('jobs','comments'));


    }
}
