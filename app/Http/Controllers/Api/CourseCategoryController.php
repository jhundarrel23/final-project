<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseCategoryRequest;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    
    public function index()
    {
        $courseCategories = CourseCategory::all();
        return response()->json($courseCategories);
    }

    public function store(StoreCourseCategoryRequest $request)
    {
     
        $courseCategory = CourseCategory::create([
            'user_id' => auth()->id(), 
            'course_name' => $request->course_name,
        ]);

        return response()->json($courseCategory, 201);
    }

    public function show(CourseCategory $courseCategory)
    {
        return response()->json($courseCategory);
    }

    public function update(StoreCourseCategoryRequest $request, CourseCategory $courseCategory)
    {
   
        $courseCategory->update([
            'course_name' => $request->course_name,
        ]);

        return response()->json($courseCategory);
    }

    // Delete a course category
    public function destroy(CourseCategory $courseCategory)
    {
        $courseCategory->delete();
        return response()->json(['message' => 'Course Category deleted successfully.']);
    }
}
