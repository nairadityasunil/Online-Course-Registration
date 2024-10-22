<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Course_student;
use App\Models\Students;
use App\Models\User_master;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    // In StudentController.php
    public function student_panel()
    {
        // Get the currently logged-in student's ID from the session
        $student_id = session('user.id'); // Accessing the ID directly from the session array

        // Fetch the student details from the database using the ID
        $student = Students::find($student_id);

        // If the student is not found, handle the error (optional)
        if (!$student) {
            return redirect()->route('login')->withErrors(['err_msg' => 'Student not found']);
        }

        $enrolled_courses = Course_student::join('students', 'course_student.student_id', '=', 'students.id')->join('courses', 'course_student.course_id', '=', 'courses.id')->where('students.id', '=', session('user.id'))->select('courses.course_name', 'courses.duration')->get();

        // Pass the student details to the view
        return view('student.student_panel', [
            'student' => $student,
            'courses' => $this->getAvailableCourses(), // You can fetch the available courses if needed
            'enrolled' => $enrolled_courses,
        ]);
    }

    // Add a method to get available courses if required
    private function getAvailableCourses()
    {
        // Example logic to fetch available courses
        return Course::all(); // Adjust this logic as needed for your application
    }


    public function registration_form()
    {
        $course = Course::select(['course_name'])->get(); // retrieving all course names form table
        return view('student.registration_form')->with(['course' => $course]);
    }

    // Function to register new student
    public function register_student(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'dob' => 'required',
                'contact' => 'required|numeric',
                'parent_contact' => 'required',
                'email' => 'required|email|unique:students,email',
                // 'course' => 'required',
                'password' => 'required'
            ]
        );
        $student = new Students();
        $student->name = $request->name;
        $student->dob = $request->dob;
        $student->contact = $request->contact;
        $student->parent_contact = $request->parent_contact;
        $student->email = $request->email;
        // $student->course_name = $request->course;
        $student->password = md5($request->password);

        $student->save(); // inserting the new student in the database
        return redirect()->route('all_students'); // Returning to the new student registration form
    }

    public function all_student()
    {
        $all_students = Students::all(); // Fetching records of all students from the database
        return view('admin.display_students')->with(['all_students' => $all_students]);
    }

    public function update_student($id)
    {
        return view('admin.update_student')->with(['student' => Students::find($id), 'course' => Course::select(['course_name'])->get()]); // Render View Update Student
    }

    // Function to save student update
    public function save_student_update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'dob' => 'required',
                'contact' => 'required|numeric',
                'parent_contact' => 'required',
                'email' => 'required|email|unique:students,email',
                'course' => 'required',
            ]
        );
        $update_student = Students::find($id); // Fetching the details of the student
        if ($update_student) {
            // If the update details are found then...

            // Update the details in the student table
            $update_student->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'contact' => $request->contact,
                'parent_contact' => $request->parent_contact,
                'email' => $request->email,
                'course_name' => $request->course,
            ]);

            if ($request->password != "") {
                $update_student->update([
                    'password' => md5($request->password)
                ]);
            }

            return redirect()->route('all_students');
        }
    }

    // Function to delete student record
    public function delete_student($id)
    {
        $student = Students::find($id);
        $student->delete(); // Deleteing the student
        return redirect()->route('all_students');
    }


    public function enroll_in_course($course_id)
    {
        // Retrieve the logged-in student from session
        $student = session('user');

        $already_enrolled = Course_student::where('student_id', session('user.id'))->where('course_id', $course_id)->exists();

        if ($already_enrolled) {
            // If already enrolled, redirect back with a message
            return redirect()->back()->withErrors(['err_msg' => 'You are already enrolled in this course.']);
        }
        if ($student) {
            $enroll = new Course_student();
            $enroll->student_id = session('user.id');
            $enroll->course_id = $course_id;
            $enroll->save();
            // Redirect to the student panel with a success message
            return redirect()->route('student_panel')->with('success', 'Successfully enrolled in the course.');
        }

        // If the student is not logged in or something goes wrong
        return redirect()->route('student_panel')->withErrors(['err_msg' => 'Unable to enroll in the course.']);
    }


    public function update_profile(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'contact' => 'required|string|max:255',
            'parent_contact' => 'required|string|max:255',
        ]);

        // Get the currently logged-in student's ID from the session
        $student_id = session('user.id');

        // Update the student's details
        $student = Students::find($student_id);
        if ($student) {
            $student->update([
                'contact' => $request->contact,
                'parent_contact' => $request->parent_contact,
            ]);

            return redirect()->route('student_panel')->with('success', 'Profile updated successfully!');
        }

        return back()->withErrors(['err_msg' => 'Student not found']);
    }
}
