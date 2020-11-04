<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Category;

class CategoryController extends Controller
{
   
    public function index($id){
    	$jobs = Job::latest()->where('category_id',$id)->paginate(20);
    	$categoryName = Category::where('id',$id)->first();
    	return view('frontend.category',compact('jobs','categoryName'));
	}
	
	public function create(){
        return view('admin.createcat');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
        ]);
       
            Category::create([
                'name'=>$title=$request->get('name'),
                
            ]);
        
            return redirect()->back()->with('success','Category Added Successfully');
	}

    public function update(Request $request)
    {
        $category = array(
            'name' => $request->name,
            
    );

    Category::findOrfail($request->cat_id)->update($category);
    return redirect()->back()->with('success','Category Updated Successfully');
}

public function deletecat($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}


