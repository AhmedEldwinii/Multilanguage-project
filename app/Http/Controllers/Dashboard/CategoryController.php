<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Categories\CategoriesStoreRequest;
use App\Http\Requests\Dashboard\Categories\CategoriesUpdateRequest;
use App\Models\Setting;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{

    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $this->authorize('view' ,$this->setting);
        return view('dashboard.categories.index');
    }



    public function getAllCategory()
    {
        $query = Category::with('parents')->select('*');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<a href="' . route('dashboard.categories.edit', $row->id) . '" class="edit btn btn-secondary"><i class="fas fa-thin fa-pen-fancy"></i></a>
                <button type="button" id="deleteBtn" data-id="' . $row->id .'" class="btn btn-danger mt-md-0 mt-2" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })
            ->addColumn('parent', function ($row) {
                return ($row->parent_id == 0) ? 'Main Category' : $row->parents->translate(app()->getLocale())->title;
            })
            ->addColumn('image', function ($row) {
                return '<img src="'.asset($row->image).'" width="100px" height="100px">';
            })
            ->rawColumns(['action', 'parent', 'image'])
            ->make(true);
    }





    public function create()
    {
        $this->authorize('view' ,$this->setting);
        $categories = Category::where('parent_id' , null)->orWhere('parent_id', 0)->get();
        return view('dashboard.categories.create' , compact('categories'));
    }





    public function store(CategoriesStoreRequest $request)
    {
        $request['parent_id'] = $request['parent_id'] ?? 0 ;

        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = ImageUpload::uploadImage($request->file('image'));

            $validatedData['image'] = $imagePath;
        }
        // dd($validatedData);
        Category::create($validatedData);
        return redirect()->route('dashboard.categories.index');
    }



    public function edit(Category $category)
    {
        $this->authorize('view' ,$this->setting);
        $categories = Category::where('parent_id' , null)->orWhere('parent_id', 0)->get();
        return view('dashboard.categories.edit' , compact('category' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesUpdateRequest $request, Category $category)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = ImageUpload::uploadImage($request->file('image'));

            $validatedData['image'] = $imagePath;
        }
        // dd($validatedData);
        $category->update($validatedData);
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete( Request $request)
    {
        $this->authorize('view' ,$this->setting);
        Category::where('id' ,$request->id)->delete();
        Category::where('parent_id' ,$request->id)->delete();
        return redirect()->route('dashboard.categories.index');
    }
}
