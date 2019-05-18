<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminMediasController extends Controller
{
    //



    public function index(){

        //assingn all the photos to a variable $photos 
        $photos = Photo::all();


        return view('admin.media.index', compact('photos'));



    }



    public function create(){


        return view('admin.media.create');


    }



    public function store(Request $request){

        //making arequest 'file' type
        $file = $request->file('file');

        //random time for the images
        $name = time() . $file->getClientOriginalName();
        //move to asset folder
        $file->move('images', $name);


        //creating the file(photo)
        Photo::create(['file'=>$name]);



    }


        public function destroy($id){


            $photo = Photo::findOrFail($id);


            unlink(public_path() . $photo->file);


            $photo->delete();







    }


    public function deleteMedia(Request $request){



        if(isset($request->delete_all) && !empty($request->checkBoxArray)){


            $photos = Photo::findOrFail($request->checkBoxArray);


            foreach($photos as $photo){

                $photo->delete();

            }


            return redirect()->back();


        } else {



            return redirect()->back();



        }














    }






}
