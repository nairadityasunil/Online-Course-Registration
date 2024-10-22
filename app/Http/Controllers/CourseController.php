<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function view_courses(){
        $courses = Course::all(); // Fetch all courses from the database
        return view('student.student_view_courses')->with('courses', $courses);
    }

    public function new_course()
    {
        return view('admin.new_course');
    }

    public function save_course(Request $request)
    {
        $request->validate([
            'course' => 'required|unique:courses,course_name',
            'description' => 'required',
            'duration' => 'required|numeric',
        ]);

        $new_course = new Course();
        $new_course->course_name = $request->course;
        $new_course->description = $request->description;
        $new_course->duration = $request->duration;
        $new_course->save();

        return redirect()->route('all_courses')->with('success', 'Course created successfully.');
    }

    public function all_courses()
    {
        // Fetching the list of all the courses and sending the data to the view
        return view('admin.all_courses')->with(['courses' => Course::all()]);
    }

    public function update_course($id)
    {
        // Finding the details of the course using id as the primary key
        $course = Course::find($id);
        
        if (!$course) {
            return redirect()->route('all_courses')->withErrors(['err_msg' => 'Course not found.']);
        }

        return view('admin.update_course')->with(['course' => $course]);
    }

    // Function to update course details
    public function save_course_update(Request $request, $id)
    {
        $request->validate([
            'course' => 'required|unique:courses,course_name,' . $id,
            'description' => 'required',
            'duration' => 'required|numeric',
        ]);

        $course_details = Course::find($id);
        
        if ($course_details) {
            $course_details->update([
                'course_name' => $request->course,
                'description' => $request->description,
                'duration' => $request->duration,
            ]);
            return redirect()->route('all_courses')->with('success', 'Course updated successfully.');
        }

        return redirect()->route('all_courses')->withErrors(['err_msg' => 'Course not found.']);
    }

    // Function to delete course details
    public function delete_course($id)
    {
        $course = Course::find($id);
        
        if ($course) {
            $course->delete();
            return redirect()->route('all_courses')->with('success', 'Course deleted successfully.');
        }

        return redirect()->route('all_courses')->withErrors(['err_msg' => 'Course not found.']);
    }
}