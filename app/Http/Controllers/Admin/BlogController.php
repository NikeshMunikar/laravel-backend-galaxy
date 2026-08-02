<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Notifications\NotifyNewContactFormSubmission;
use App\Models\Blog;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
  
        $page_name = 'Blogs';
        $blog = Blog::orderBy('id','desc')->get();
        return view('admin.blog.list',compact('page_name','blog','user','notification'));
    }   //end of method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_name = 'Blogs Form';
        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
  
        return view('admin.blog.create', compact('page_name','user','notification'));
    }   //end of method


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //for validation section starts
        $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_desc' => 'required',
            'blog_content' => 'required',
            'blog_cover' => 'required',
            'blog_by' => 'required',
        ],[
            'blog_title.required' => 'Please input title',
            'blog_desc.required' => 'Description is required',
            'blog_content.required' => 'Please Provide Some Content',
            'blog_cover.required' => 'This filed is required',
            'blog_by.required' => 'Please provide Blogger Name',
        ]);
        //for validation section ends
        //for storing
        $blog = new Blog();
        $blog->blog_title = $request->blog_title;
        $blog->blog_desc = $request->blog_desc;
        $blog->blog_content = $request->blog_content;
        // $blog->blog_cover = $request->blog_cover;
        $blog->blog_by = $request->blog_by;

        $data = $request->except(['blog_cover', 'cover_option']);
        
        if ($request->hasFile('blog_cover')) {
            $imagePath = $request->file('blog_cover')->store('blog_covers', 'public');
            $data['blog_cover'] = $imagePath;
        }
        
        // Assuming you have an input named 'cover_option' in your form
        if ($request->input('cover_option') === 'url') {
            $data['blog_cover'] = $request->input('cover_url');
        }
        $blog->blog_cover = $data;
        $blog->save();

        return redirect()->route('blog')->with('success', 'Blog Data Added Sucessfully.');


    }   //end of method

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
