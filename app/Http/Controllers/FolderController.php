<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

          if(Auth::check()){     
           $Folders=Folder::where('user_id',Auth::user()->id)->get();
            
          return view('layouts.folders.index',['folders'=>$Folders]);
         // return view('layouts.folders.index',compact('folders'));


}
          return view('auth.login');

          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.folders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
        $folder=Folder::create([
        'name'=>$request->input('name'),
       // 'description'=>$request->input('description'),
        'user_id'=>Auth::user()->id
        ]);
      

       if($folder){
        return redirect()->route('folders.index',['folder'=>$folder->id])->with('success','folder was created successfully');
       }
      }

   return back()->withInput()->with('errors', 'Error creating new folder');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
         $folder=Folder::find($folder->id); // $projects=project::with('folder')->get(); // return view("layouts.folders.show",['projects'=>$projects]);
       
      return view("layouts.folders.show",['folder'=>$folder]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
          $folder=Folder::find($folder->id);
     // $projects=project::with('folder')->get();
     // return view("layouts.folders.show",['projects'=>$projects]);

      return view("layouts.folders.edit",['folder'=>$folder]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {
        $folderUpdate=Folder::where('id',$folder->id)->update([

          'name'=>$request->input('name'),
         // 'description'=>$request->input('description')
        ]);

        if($folderUpdate){
        return redirect()->route('folders.show',['folder'=>$folder->id])->with('success','folder updated successfully');
    }

    return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {
         $folderDelete=Folder::where('id',$folder->id)->delete();

        if($folderDelete){
        return redirect()->route('folders.index')->with('success','folder deleted successfully');
    }

    return back()->withInput()->with('error','folder cannot be deleted');
    }
   
}
