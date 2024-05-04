<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Posts\PostsStoreRequest;
use App\Http\Requests\Dashboard\Posts\PostsUpdateRequest;
use Illuminate\Cache\Events\CacheHit;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index');
    }


    public function create()
    {
        $categories = Category::all();
        if(count($categories) > 0 ){
            return view('dashboard.posts.create' , compact('categories'));
        }
        return view('dashboard.categories.create');
    }



    public function getAllPost()
    {
        $query = Post::with('category')->select('*');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                if(auth()->user()->can('update' , $row)){
                    return '<a href="' . route('dashboard.posts.edit', $row->id) . '" class="edit btn btn-secondary"><i class="fas fa-thin fa-pen-fancy"></i></a>
                            <button type="button" id="deleteBtn" data-id="' . $row->id .'" class="btn btn-danger mt-md-0 mt-2" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></button>';
                } else {
                    return '<h10 class="text-muted">Not Available</h10>';
                }
            })
            ->addColumn('category_name', function ($row) {
                // Check if category exists and has translations
                if ($row->category && $row->category->hasTranslation('title')) {
                    // Return translated title
                    return $row->category->translate(app()->getLocale())->title;
                } else {
                    // Return a placeholder if translation doesn't exist
                    return __('Unknown');
                }
            })
            ->addColumn('image', function ($row) {
                return '<img src="'.asset($row->image).'" width="100px" height="100px">';
            })
            ->rawColumns(['action', 'category_name', 'image'])
            ->make(true);
    }






    public function store(PostsStoreRequest $request , Post $post)
    {
        // dd($request->all());
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = ImageUpload::uploadImage($request->file('image'));

            $validatedData['image'] = $imagePath;
        }
        $post->update(['user_id' => auth()->user()->id]);
        // dd($validatedData);
        Post::create($validatedData);
        return redirect()->route('dashboard.posts.index');
    }




    public function edit(Post $post)
    {
        $this->authorize('update' , $post);
        $categories = Category::all();
        return view('dashboard.posts.edit' , compact('post' , 'categories'));
    }





    public function update( PostsUpdateRequest $request, Post $post)
    {
        $this->authorize('update' , $post);
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = ImageUpload::uploadImage($request->file('image'));
            $validatedData['image'] = $imagePath;
        }

        $post->update(['user_id' => auth()->user()->id]);

        $post->update($validatedData);

        return redirect()->route('dashboard.posts.index');

    }


    public function destroy(string $id)
    {
        //
    }


    public function show()
    {
        //
    }

    public function delete( Request $request , Post $post)
    {
        $this->authorize('delete' , $post);

        Post::where('id' ,$request->id)->delete();
        return redirect()->route('dashboard.posts.index');
    }
}
