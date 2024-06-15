<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teachers(){
        return view('admin.teacher-info.teacher');
    }

    public function view_teachers(){
        return view('admin.teacher-info.view-teachers');
    }

    public function edit_teachers(){
        return view('admin.teacher-info.edit-teachers');
    }

    public function admit_teachers(){
        return view('admin.teacher-info.admit-teachers');
    }

    public function delete_teachers(){
    }

    public function edit_teacher(){
        return view('teachers.edit-teacher');
    }

    public function teacher_attendance(){
        return view('teachers.teacher-attendance');
    }

    public function teacher_event(){
        return view('teachers.teacher-event');
    }

    public function teacher_class_routine(){
        return view('teachers.teacher-class-routine');
    }

    public function teacher_exam_routine(){
        return view('teachers.teacher-exam-routine');
    }

    public function teacher_attendance_list(){
        return view('teachers.teacher-attendance-list');
    }

    public function teacher_attendance_report(){
        return view('teachers.teacher-attendance-report');
    }

    public function teacher_mark_sheet(){
        return view('teachers.teacher-mark-sheet');
    }

    public function teacher_gallery_category(){
        return view('teachers.teacher-gallery-category');
    }

    public function teacher_image(){
        return view('teachers.teacher-image');
    }

    public function teacher_video(){
        return view('teachers.teacher-video');
    }

    public function view_teacher_video(){
        return view('teachers.view-teacher-video');
    }

    public function view_teacher_image(){
        return view('teachers.view-teacher-image');
    }

    public function teacher_add_image(){
        return view('teachers.teacher-gallery-category');
    }

    public function teacher_add_video(){
        return view('teachers.teacher-gallery-category');
    }

    public function teacher_calender(){
        return view('teachers.teacher-calender');
    }

    public function parent_detail(){
        return view('teachers.parent-detail');
    }

    public function student_detail(){
        return view('teachers.student-detail');
    }
}

