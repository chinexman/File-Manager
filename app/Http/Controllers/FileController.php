<?php

namespace App\Http\Controllers;
use DB;
use App\File;
use App\Folder;
Use App\Comment;
Use App\User;
use App\fileUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           
            
           if(Auth::check()){     
          $files=File::where('user_id',Auth::user()->id)->get();

          return view('layouts.files.index',['files'=>$files]);
         // return view('layouts.files.index',compact('files'));


}
          return view('auth.login');

           }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($folder_id = null)

    {          
               $folders=null;
              if(!$folder_id){

                $folders=folder::where('user_id',Auth::user()->id)->get();
                
              }
              
        return view('layouts.files.create' ,['folder_id'=>$folder_id ,'folders'=>$folders]);
    }



    public function adduser(Request $request){

 $file=file::find($request->input('file_id'));
    if(Auth::user()->id==$file->user_id){
$user=User::where('email', $request->input('email'))->first();
if($user==null){
     return redirect()->route('files.show',['file'=>$file->id])->with('errors',$request->input('email').'  is not registered');

}
$fileuser=fileUser::where('user_id',$user->id)->where('file_id',$file->id)->first();
if($fileuser){
  return redirect()->route('files.show',['file'=>$file->id])->with('errors',$request->input('email').'   already exists');
  
}
if($user  && $file){
    $file->users()->attach($user->id);
    return redirect()->route('files.show',['file'=>$file->id])->with('success','user was added  successfully');
 
}



}

return redirect()->route('files.show',['file'=>$file->id])->with('errors','error adding user to file');
    }



    public function upload (Request $request){

        $paths=$request->file('image');
        if ($request->file('image') == null) {
    $paths = "no file recieved";
}else{
       foreach ($paths as $path) {
          // $path->store('upload'); 
          $pa=Storage::putFile('upload',$path); 
           echo $path->getClientOriginalName();
           echo '<br>';
       }
  // $path = $request->file('image[]')->store('upload');  
}
     //  $path=$request->file('image')->store('upload');
     //  echo $path;
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
         $input=$request->all();
         $images=array();
          $record=null;
         $files=$request->file('image');


         
          foreach ($files as $file) {
               $name=$file->getClientOriginalName();
               $pa=Storage::putFile('upload',$file);
               
       $file=new File();
      //$file->uuid=json_encode($file);
        $file->filename=json_encode($name);
        $file->uuid=$pa;
       $file->folder_id=$request->input('folder_id');
       $file->user_id=Auth::user()->id;

       $file->save();  
          }

          
         
     
         
      
 return redirect()->route('folders.show',['folder_id'=>$file->folder_id])->with('success','files was created successfully');


}

    }


    public function download(file $file)
    {
                     dd($file);
       
          //  return Storage::download({$file->uuid});

        // view("files.download", compact('$download'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function show(file $file)
    {
       

       // $file=file::where('id',$file->id)->first();
     $file=File::find($file->id);
                return Storage::download($file->uuid,$file->filename);

                // return response()->download(storage_path("app/upload/{$file->filename}"));

   //  return Storage::download($file->path,$file->filename);
     // $files=file::with('file')->get();
     // return view("layouts.files.show",['files'=>$files]);


//$comments=$file->comments;
     //$comment=Comment::where('commentable_id',$file->id)->get();
     
        //dump($comments);
      //return view("layouts.files.show",['file'=>$file]);
         // return view("layouts.files.show",['file'=>$file,'comments'=>$comments]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(file $file)
    {
          $file=file::find($file->id);
     // $files=file::with('file')->get();
     // return view("layouts.files.show",['files'=>$files]);

      return view("layouts.files.edit",['file'=>$file]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, file $file)
    {
        $fileUpdate=file::where('id',$file->id)->update([

          'name'=>$request->input('name'),
         // 'description'=>$request->input('description')
        ]);

        if($fileUpdate){
        return redirect()->route('files.show',['file'=>$file->id])->with('success','file updated successfully');
    }

    return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\file  $compan,y
     * @return \Illuminate\Http\Response
     */
    public function destroy(file $file)
    {
        
   
        $fileDelete=file::where('id',$file->id)->delete();

        if($fileDelete){
       return redirect()->route('folders.show',['folder_id'=>$file->folder_id])->with('success','files was created successfully');

    }

    return back()->withInput()->with('error','file cannot be deleted');
    }
}
