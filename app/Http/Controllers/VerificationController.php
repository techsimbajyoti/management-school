<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentParent;

class VerificationController extends Controller
{
    public function verifyRegistration($applicantId)
    {
        // Perform verification logic here, e.g., mark applicant as verified
        $applicant = StudentParent::where('applicant_id', $applicantId)->firstOrFail();
        $applicant->verified = true; // Example logic, adjust as per your requirements
        $applicant->save();

        // Redirect to a thank you page or display a confirmation message
        return view('verification.thank_you');
    }
}


