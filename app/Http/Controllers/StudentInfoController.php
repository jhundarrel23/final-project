<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class StudentInfoController extends Controller
{
    /**
     * Store student info.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Please log in first.',
            ], 401);
        }

        $userId = $request->user_id;

        // ✅ Check if the user already submitted student info
        $existingInfo = StudentInfo::where('user_id', $userId)->first();
        if ($existingInfo) {
            return response()->json([
                'success' => false,
                'message' => 'You have already submitted your student information.',
            ], 403); // Forbidden
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'student_id' => 'required|string|unique:student_info,student_id',
            'course_category_id' => 'required|exists:course_categories,id',
            'year_level' => 'nullable|in:1st year,2nd year,3rd year,4th year',
            'dob' => 'required|date',
            'address' => 'nullable|string',
            'gender' => 'nullable|in:male,female,other',
            'civil_status' => 'nullable|in:single,married,other',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        try {
            $studentInfo = StudentInfo::create([
                'user_id' => $userId,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'student_id' => $request->student_id,
                'course_category_id' => $request->course_category_id,
                'year_level' => $request->year_level,
                'dob' => $request->dob,
                'address' => $request->address,
                'gender' => $request->gender,
                'civil_status' => $request->civil_status ?? 'single',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Student information saved successfully.',
                'data' => $studentInfo,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving student information.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get the authenticated user's student info.
     */
    public function showByUserId($userId)
    {
        $studentInfo = StudentInfo::where('user_id', $userId)->first();

        if (!$studentInfo) {
            return response()->json([
                'success' => false,
                'message' => 'Student profile not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $studentInfo,
        ]);
    }
}
