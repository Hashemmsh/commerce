<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Traits\Trans;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories= Category::with('parent')->orderByDesc('id')->paginate(10);
      return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        $categories= Category::select('id' , 'name')->get();
       return view('admin.categories.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name_en'=>'required',
        'name_ar'=>'required',
        'parent_id'=>'nullable|exists:categories,id'
      ]);
      $img_name=null;
      if($request->hasFile('image')){
      $img_name= rand().time().$request->file('image')->getClientOriginalName();
      $request->file('image')->move(public_path('uploads/categories'), $img_name );
      }
      $name= json_encode(['en' => $request->name_en
      ,'ar'=>$request->name_ar],JSON_UNESCAPED_UNICODE

    );
      Category::create([
        //'name' => $request ->name_en,
        'name' =>$name,
        'image'=>$img_name,
        'parent_id'=> $request->parent_id
      ]);
      return redirect()->route('admin.categories.index')->with('msg','Category created successfully')->with('type','success');
    }



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
    public function edit(Category $category)
    {
       // $category=Category::findOrFail($id);
        // dd($category);
        $categories= Category::select('id' , 'name')->where ('id', '!=',$category->id)->get();
        return view('admin.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'parent_id'=>'nullable|exists:categories,id|not_in:'
          ]);
          $img_name=$category->image;
          if($request->hasFile('image')){
          $img_name= rand().time().$request->file('image')->getClientOriginalName();
          $request->file('image')->move(public_path('uploads/categories'), $img_name );
          }
          $name= json_encode(['en' => $request->name_en
          ,'ar'=>$request->name_ar],JSON_UNESCAPED_UNICODE

        );
          $category->update([
            //'name' => $request ->name_en,
            'name' =>$name,
            'image'=>$img_name,
            'parent_id'=> $request->parent_id
          ]);
          return redirect()->route('admin.categories.index')->with('msg','Category updated successfully')->with('type','success');
    }


    public function destroy($id)
    {
        $category =Category::find($id);
        File::delete(public_path('uploads/categories'.$category->image));
        Category::where('parent_id',$id)->update(['parent_id'=>null]);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('msg','Category deleted successfully')->with('type','danger');

    }
     public function trash()
     {
       $categories=Category::onlyTrashed()->get();
        return view('admin.categories.trash',compact('categories'));
     }

    public function restore($id)
    {
        Category::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.categories.index')->with('msg','Category Restore successfully')->with('type','success');

      }


    public function forcedelete($id)
    {

       $category= Category::onlyTrashed()->find($id);
        File::delete(public_path('upload/categories/'.$category->image));
        $category->forcedelete();
        return redirect()->route('admin.categories.trash')->with('msg','Category deleted permanintly successfully')->with('type','danger');
    }


}
