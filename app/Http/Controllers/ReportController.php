<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report_marksheet(){
        return view('admin.reports.report-marksheet');
    }

    public function report_merit_list(){
        return view('admin.reports.report-merit-list');
    }

    public function report_progress_card(){
        return view('admin.reports.report-progress-card');
    }

    public function report_due_fees(){
        return view('admin.reports.report-due-fees');
    }

    public function report_fees_collection(){
        return view('admin.reports.report-fees-collection');
    }

    public function report_account(){
        return view('admin.reports.report-account');
    }

    public function report_class_routine(){
        return view('admin.reports.report-class-routine');
    }

    public function report_exam_routine(){
        return view('admin.reports.report-exam-routine');
    }

    public function report_attendance(){
        return view('admin.reports.report-attendance');
    }

}
