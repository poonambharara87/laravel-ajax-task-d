<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{


    public function index()
    {
        return view('auth.login');
    }
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:csv,txt,xlx,xls,pdf'
        ]);
        
        try {
            $user =  Auth::user()->toArray();
            $role = $user['role_type'];
            
            if($role == 1)
            {
             \Log::info("role =1");   
                $insert = [];
                if ($request->TotalFiles > 0) {
                    
                    for ($x = 0; $x < $request->TotalFiles; $x++) {

                        if ($request->hasFile('files'.$x)) {

                            $file = $request->file('files'. $x);
                            $path = $file->store('public/docs');
                            $name = $file->getClientOriginalName();  
                        
                            $insert[$x]['doc_name'] = $name;
                            $insert[$x]['docs_path'] = $path;
                            $insert[$x]['user_id'] = $user['id'];

                        }
                    }
                   
                    $post = Post::insert($insert);
                    return response()->json(['message', 'Added Successfully!']);
                }else{
                    return response()->json(['message', 'No files']);
                } 
            }else{
                return response()->json(['message' => 'You do not have access']);
            }
        
        } catch (\Exception $e) {
            \Log::error('Error in file upload: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred. Please try again.']);
        }
    }
 
    public function edit($id)
    {

        $post = Post::find($id);

            

        if($post){
            return response()->json([
                'status' => 200,
                'post' => $post
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'post' => "Post Not Found"
            ]);
        }


        // return view('post.edit', compact('post'));

    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'files' => 'nullable|array', // Make the 'files' field optional
            'files.*' => 'mimes:csv,txt,xlx,xls,pdf'
        ]);
    
        try {
            $user = Auth::user();
            $role = $user->role_type;
    
            if ($role == 1) {
                $insert = [];
    
                if ($request->has('files') && count($request->files) > 0) {
                    foreach ($request->files as $file) {
                        if ($file->isValid()) {
                            
                            $name = $file->getClientOriginalName();                         
                            $path = $file->store('public/docs' , $name);
                            $post = new Post();
                            $post->doc_name = $name;
                            $post->docs_path = $path.name;
                            $post->user_id = $user->id;
    
                            $post->save();
                        }
                    }
    
                    return response()->json(['message' => 'Added/Updated Successfully!']);
                } else {
                    return response()->json(['message' => 'No files']);
                }
            } else {
                return response()->json(['message' => 'You do not have access']);
            }
    
        } catch (\Exception $e) {
            \Log::error('Error in file upload: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred. Please try again.']);
        }
    }
    public function list(){
        
        $posts = Post::where('user_id',1)->get();
 
        // $all_post = [];
        // foreach($posts as $k => $pt)
        // {
        //     $path = $pt->docs_path; 
        //     $name = $pt->doc_name;
        //     $all_post[$k]['id']  = $pt->id;
        //     $all_post[$k]['name'] = $name;
        //     $all_post[$k]['path'] = $path;
        // }
        // $data = json_encode($all_post);
        // if ($data) {
        //     // return response()->json([$all_post]);
            return view('list', compact('posts'));
        // } else {
        //     return view('auth.dashboard');
        // }

        // $posts = Post::all();
        // if($posts){
            // return response()->json(['post' => $posts]);
        // }else{
        //     return response()->json(['msg' => "no data"]);
        // }
    }


}
