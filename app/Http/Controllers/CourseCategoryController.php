<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    public function index()
    {
        // Fetch all course categories from the database
        $categories = CourseCategory::all();

        // Return the categories as a JSON response
        return response()->json($categories);
    }
}
