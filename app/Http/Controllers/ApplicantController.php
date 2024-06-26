<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\BloodGroup;
use App\Models\Language;
use App\Models\Religion;
use App\Models\State;
use App\Models\Country;
use App\Models\StudentParent;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class ApplicantController extends Controller
{
    public function getPublicIpAddress()
    {
            $response = Http::timeout(90) // Set the timeout to 30 seconds
            ->get('https://api64.ipify.org?format=json');

            $data = $response->json();
            $ipAddress = $data['ip'];
            return $ipAddress;
    }

    public function applicant(){
        return view('pages.applicant');
    }

    public function applicant_list(){
        
        $applicant_list = Student::join('student_parents', function ($join) {
            $join->on('students.parent_id', '=', 'student_parents.id')
                 ->on('students.applicant_id', '=', 'student_parents.applicant_id');
        })
        ->select('students.*', 'student_parents.*')
        ->get();
        
               
        return view('admin.applicant.applicant-list',compact('applicant_list'));
    }

    public function view_applicant($id)
    {
        $country = Country::get();
        $test = [];
        foreach ($country as $count) {
            $test[] = $count->country;
        }
    
        $state = State::get();
        $testing = [];
        foreach ($state as $sta) {
            $testing[] = $sta->state;
        }
    
        $country = Country::get(['id', 'country']);
        $state = State::get(['id', 'state']);
    
        $Religion = Religion::get();
        $BloodGroup = BloodGroup::get();
    
        $Language = Language::get();
        $lang = [];
        foreach ($Language as $lng) {
            $lang[] = $lng->name;
        }
    
        $applicant_data = Student::join('student_parents', function ($join) use ($id) {
            $join->on('students.parent_id', '=', 'student_parents.id')
                 ->on('students.applicant_id', '=', 'student_parents.applicant_id')
                 ->where('student_parents.id', '=', $id);
        })
        ->select('students.*', 'student_parents.*')
        ->first();
    
        return view('admin.applicant.view-applicant', compact('lang', 'Language', 'BloodGroup', 'Religion', 'state', 'country', 'test', 'testing', 'applicant_data'));
    }
    
    public function edit_applicant( Request $request,$id){
        $country = Country::get();

        $test = [];
        foreach($country as $count){
            $test[] = $count->country;
        }
        $state = State::get();
        $testing = [];
        foreach($state as $sta){
            $testing[] = $sta->state;
        }
        $country = Country::get(['id','country']);
        $state = State::get(['id','state']);



        $Religion = Religion::get();
        $BloodGroup = BloodGroup::get();

        $Language = Language::get();
        $lang = [];
        foreach($Language as $lng){
            $lang[] = $lng->name;
        }

        $applicant_data = Student::join('student_parents', function ($join) use ($id) {
            $join->on('students.parent_id', '=', 'student_parents.id')
                 ->on('students.applicant_id', '=', 'student_parents.applicant_id')
                 ->where('student_parents.id', '=', $id);
        })
        ->select('students.*', 'student_parents.*')
        ->first();

        // print_r($applicant_data);
        // exit;
        
        return view('admin.applicant.edit-applicant',compact('lang','Language','BloodGroup','Religion','state','country','test','testing','applicant_data','request'));
    }
    public function delete_applicant($id)
{
    // Find the student by parent_id
    $student = Student::where('parent_id', $id)->first();
    
    if (!$student) {
        return redirect()->back()->with('error', 'Student not found');
    }

    // Find the parent
    $parent = StudentParent::find($id);

    if (!$parent) {
        return redirect()->back()->with('error', 'Parent not found');
    }

    // Soft delete the student
    $student->delete();
    
    // Soft delete the parent
    $parent->delete();

    return redirect()->back()->with('status', 'Deleted Successfully');
}

    

    public function update_applicant(Request $request, $id)
    {
        $validatedData = $request->validate([
            'parent_name' => 'required|string|regex:/^[A-Za-z ]+$/',
            'email' => 'required',
            'password' => 'required',
            'contact_number' => 'required|digits_between:10,15',
            'profession' => 'nullable|string|regex:/^[A-Za-z ]+$/',
           
        ]);
    
        $ipAddress = $this->getPublicIpAddress();
    
        $parent = StudentParent::findOrFail($id);
    
        $parent->father_name = $request->parent_name;
        $parent->father_mobile = $request->contact_number;
        $parent->email = $request->email;
        $parent->father_profession = $request->profession;
        $parent->role_id = $request->role_id;
        $parent->status = $request->status;
        $parent->ip_address = $ipAddress;
        $parent->created_by = 'null';
    
        $parent->save();
    
        Session::put('parent_id', $parent->id);
       
    
        return response()->json(['success' => 'true', 'action' => $request->action]);
    }

    public function update_student_applicant(Request $request ,$parent_id)
    {
        $validatedData = $request->validate([
            'first_name' =>'required|string|regex:/^[A-Za-z ]+$/',
            'last_name' =>'required|string|regex:/^[A-Za-z ]+$/',
            'gender' => 'required',
            'class' => 'required',
            'date_of_birth' => 'required|date|before:' . now()->toDateString(),
            'student_language'=>'nullable|string',
            'category'=>'nullable|string',
            'blood_group'=>'nullable|string',
            'religion'=>'nullable|string',
            'previous_school'=>'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        
        $ipAddress = $this->getPublicIpAddress();
        
        $parent_id = Session::get('parent_id');
      
        $student_update = Student::where('parent_id', $parent_id)->firstOrFail();
        
        if ($request->hasFile('image')) {
            // Delete existing image if it exists
            if (!is_null($student_update->image)) {
                if (Storage::exists('public/student_photos/' . $student_update->image)) {
                    Storage::delete('public/student_photos/' . $student_update->image);
                }
            }
        
            // Upload new image
            $originalFileName = $request->file('image')->getClientOriginalName();
            $currentDateTime = now()->format('YmdHis');
            $profileImagePath = $request->file('image')->storeAs('public/student_photos', $currentDateTime . '_' . $originalFileName);
            $student_update->image = $currentDateTime . '_' . $originalFileName;
        } else {
            // No new image uploaded, do nothing
        }
        

        $student_update->first_name = $request->first_name;
        $student_update->last_name = $request->last_name;
         $student_update->class = $request->class;
        $student_update->date_of_birth = $request->date_of_birth;
        $student_update->blood_group = $request->blood_group;
        $student_update->student_language = $request->student_language;
        $student_update->previous_school = $request->previous_school;
        $student_update->parent_id = $parent_id;
        $student_update->role_id = $request->role_id;
        $student_update->ip_address = $ipAddress;
        $student_update->status = $request->status;
        $student_update->created_by = 'null';


        if ($request->category === 'other') {
            $student_update->category = $request->other_category;
        } else {
            $student_update->category = $request->category;
        }
        
        if ($request->religion === 'other') {
            $student_update->religion = $request->other_religion;
        } else {
            $student_update->religion = $request->religion;
        }
        
        if ($request->gender === 'other') {
            $student_update->gender = $request->other_gender;
        } else {
            $student_update->gender = $request->gender;
        }

        $student_update->save();
        Session::put(['student_id' => $student_update->id]);

        return response()->json(['success' => 'true', 'action' => $request->action]);
    }
    

    public function update_contact_applicant(Request $request ,$parent_id)
    {
        $validatedData = $request->validate([
            'residence_address' =>'required|min:3|max:255',
            'country' => 'required|string|regex:/^[A-Za-z ]+$/',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required|digits:6',
        ]);
        
              
        $student_id = Session::get('student_id');
      
        $contact_update = Student::where('parent_id', $parent_id)
                         ->where('id',$student_id)
                        ->firstOrFail();
        
                
            $contact_update->address = $request->residence_address;
            $contact_update->country = $request->country;
            $contact_update->state = $request->state;
            $contact_update->city = $request->city;
            $contact_update->pin_code = $request->pin_code;
            $contact_update->save();
        

        return response()->json(['success' => 'true', 'action' => $request->action]);
    }

   public function update_document_applicant(Request $request, $parent_id)
{
    $student_id = session::get('student_id');

    if (is_null($student_id)) {
        return response()->json(['success' => false, 'errors' => 'Student ID not found']);
    }

    try {
        $student_document_update = Student::where('parent_id', $parent_id)
            ->where('id', $student_id)
            ->firstOrFail();

        if (!$student_document_update) {
            return response()->json(['success' => false, 'errors' => 'Student not found']);
        }

        $documents = !is_null($student_document_update->document) ? json_decode($student_document_update->document, true) : [];

        if ($request->hasFile('document_file')) {
            foreach ($request->file('document_file') as $key => $file) {
                $originalFileName = $file->getClientOriginalName();
                $currentDateTime = now()->format('YmdHis');
                $documentPath = $file->storeAs('public/student_documents', $currentDateTime . '_' . $originalFileName);

                // Delete the existing file if it exists
                if (isset($documents[$key]) && Storage::exists('public/student_documents/' . $documents[$key]['file'])) {
                    Storage::delete('public/student_documents/' . $documents[$key]['file']);
                }

                $documents[$key] = [
                    'name' => $request->input('document_name')[$key],
                    'file' => $currentDateTime . '_' . $originalFileName,
                ];
            }
        }

        $student_document_update->document = json_encode($documents);
        $student_document_update->save();

        return response()->json(['success' => true, 'message' => 'Documents updated successfully']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'errors' => $e->getMessage()]);
    }
}


    public function applicant_profile(){
        return view('admin.applicant.applicant-profile');
    }

    public function schedule_meeting($id){
        $meetingStatus = $id;
        return view('admin.applicant.schedule-meeting',compact('meetingStatus'));
    }

    public function post_applicant_data(Request $request){
        
        $validatedData = $request->validate([
            'parent_name' => 'required|string|regex:/^[A-Za-z ]+$/',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'contact_number' => 'required|digits_between:10,15',
            'profession' => 'nullable|string|regex:/^[A-Za-z ]+$/',
        ]);
      
        // \Log::info('Validated Data:', ['data' => $data]);
         $ipAddress = $this->getPublicIpAddress();

        $applicant = new StudentParent;
   

        $randomApplicantId = Str::random(5);
                
        $applicant->father_name = $request->parent_name;
        $applicant->father_mobile = $request->contact_number;
        $applicant->email = $request->email;
        $applicant->password = Hash::make($request->password);
        $applicant->father_profession = $request->profession;
        $applicant->applicant_id = $randomApplicantId;
        $applicant->role_id = $request->role_id;
        $applicant->status = $request->status;
        $applicant->ip_address = $ipAddress;
        $applicant->created_by = 'null';

        $applicant->save();
        
        Session::put('parent_id',$applicant->id);
        Session::put('applicant_id',$applicant->applicant_id);
        return response()->json(['success'=>'true','action'=>$request->action]);
        
    }

    public function post_applicant_student_data(Request $request){
        $validatedData = $request->validate([
            'first_name' =>'required|string|regex:/^[A-Za-z ]+$/',
            'last_name' =>'required|string|regex:/^[A-Za-z ]+$/',
            'gender' => 'required',
            'class' => 'required',
            'date_of_birth' => 'required|date|before:' . now()->toDateString(),
            'student_language'=>'nullable|string',
            'category'=>'nullable|string',
            'blood_group'=>'nullable|string',
            'religion'=>'nullable|string',
            'previous_school'=>'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $ipAddress = $this->getPublicIpAddress();
        
        $parent_id = Session::get('parent_id');
        $applicant_id = Session::get('applicant_id');
        try {
            $student = new Student;
    
            if ($request->hasFile('image')) {
                $originalFileName = $request->file('image')->getClientOriginalName();
                $currentDateTime = now()->format('YmdHis');
                $profileImagePath = $request->file('image')->storeAs('public/student_photos', $currentDateTime . '_' . $originalFileName);
                $student->image = $currentDateTime . '_' .$originalFileName;
            } else {
                $student->image = null;
            }
    
            $randomPassword = Str::random(8);
            $hashPassword = Hash::make($randomPassword);

            $randomUsername = Str::random(8);

            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->user_name = $randomUsername;
            $student->password = $hashPassword;
            $student->class = $request->class;
            $student->date_of_birth = $request->date_of_birth;
            $student->blood_group = $request->blood_group;
            $student->student_language = $request->student_language;
            $student->previous_school = $request->previous_school;
            $student->parent_id = $parent_id;
            $student->applicant_id = $applicant_id;
            $student->role_id = $request->role_id;
            $student->ip_address = $ipAddress;
            $student->status = $request->status;
            $student->created_by = 'null';

            if ($request->category === 'other') {
                $student->category = $request->other_category;
            } else {
                $student->category = $request->category;
            }

            if ($request->religion === 'other') {
                $student->religion = $request->other_religion;
            } else {
                $student->religion = $request->religion;
            }

            if ($request->gender === 'other') {
                $student->gender = $request->other_gender;
            } else {
                $student->gender = $request->gender;
            }

            $student->save();
            Session::put(['student_id' => $student->id]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }
    }
    
    public function post_applicant_contact_data(Request $request){
        $data = $request->validate([
               
                'residence_address' =>'required|min:3|max:255',
                'country' => 'required|string|regex:/^[A-Za-z ]+$/',
                'state' => 'required',
                'city' => 'required',
                'pin_code' => 'required|digits:6',
               
            ],
                  
        );
        
         
        $student_id = session::get('student_id');

        if (is_null($student_id)) {
          return response()->json(['success' => false, 'errors' => 'Student ID not found']);
         }
        try {
            
            $student = Student::findOrFail($student_id);
            
            $student->address = $request->residence_address;
            $student->country = $request->country;
            $student->state = $request->state;
            $student->city = $request->city;
            $student->pin_code = $request->pin_code;
                          
    
            $student->save();
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }
    }
   
    public function post_applicant_document_data(Request $request)
{
    $student_id = session::get('student_id');

    if (is_null($student_id)) {
        return response()->json(['success' => false, 'errors' => 'Student ID not found']);
    }

    try {
        $student = Student::find($student_id);
        if (!$student) {
            return response()->json(['success' => false, 'errors' => 'Student not found']);
        }

        $documents = [];

        if ($request->hasFile('document_file')) {
            foreach ($request->file('document_file') as $key => $file) {
                $originalFileName = $file->getClientOriginalName();
                $currentDateTime = now()->format('YmdHis');
                $documentPath = $file->storeAs('public/student_documents', $currentDateTime . '_' . $originalFileName);

                $documents[] = [
                    'name' => $request->input('document_name')[$key],
                    'file' => $currentDateTime . '_' . $originalFileName,
                ];
            }

            // If documents already exist, merge them
            if (!is_null($student->document)) {
                $existingDocuments = json_decode($student->document, true);
                if (is_array($existingDocuments)) {
                    $documents = array_merge($existingDocuments, $documents);
                }
            }

            $student->document = json_encode($documents);
        }

        $student->save();

        return response()->json(['success' => true, 'message' => 'Form submitted successfully!']);
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
        return response()->json(['success' => false, 'errors' => $e->getMessage()]);
    }
}


    public function showApplicantDocuments($id)
    {
        $student = Student::where('parent_id', $id)->first();

        if (!$student) {
            return response()->json(['success' => false, 'errors' => 'Student not found']);
        }

        // Decode the documents JSON field
        $documents = json_decode($student->document, true);

        return response()->json(['success' => true, 'documents' => $documents]);
    }




    public function meeting_status(){
     return view('admin.applicant.meeting-status');
    }

    public function change_meeting_status(){
        return view('admin.applicant.change-meeting-status');
    }

    public function meeting_tracking(){
         // Example steps data
    $steps = [
        ['name' => 'New', 'date' => '01/01/2024', 'status' => 'completed'],
        ['name' => 'Accepted by Admin', 'date' => '02/01/2024', 'status' => 'completed'],
        ['name' => 'Meeting Schedule', 'date' => '03/01/2024', 'status' => 'completed'],
        ['name' => 'Accepted by Parent', 'date' => '00/00/0000', 'status' => 'completed'],
        ['name' => 'Approve by Parent', 'date' => '00/00/0000', 'status' => 'completed'],
        ['name' => 'Done', 'date' => '00/00/0000', 'status' => 'completed'],
    ];

        return view('admin.applicant.meeting-tracking',compact('steps'));
    }

    public function applicant_parent_list(){
        return view('admin.applicant.applicant-parent-list');
    }

    public function add_applicant(){
        $country = Country::get();

        $test = [];
        foreach($country as $count){
            $test[] = $count->country;
        }
        $state = State::get();
        $testing = [];
        foreach($state as $sta){
            $testing[] = $sta->state;
        }
        $country = Country::get(['id','country']);
        $state = State::get(['id','state']);

        $Religion = Religion::get();
        $BloodGroup = BloodGroup::get();

        $Language = Language::get();
        $lang = [];
        foreach($Language as $lng){
            $lang[] = $lng->name;
        }

        return view('admin.applicant.add-applicant',compact('lang','Language','BloodGroup','Religion','state','country','test','testing'));
    }

    public function parent_meeting_status(){
        return view('admin.applicant.parent-meeting-status');
    }

    public function parent_meeting_track(){
        $steps = [
            ['name' => 'New', 'date' => '01/01/2024', 'status' => 'completed'],
            ['name' => 'Accepted by Admin', 'date' => '02/01/2024', 'status' => 'completed'],
            ['name' => 'Meeting Schedule', 'date' => '03/01/2024', 'status' => 'completed'],
            ['name' => 'Accepted by Parent', 'date' => '00/00/0000', 'status' => 'completed'],
            ['name' => 'Approve by Parent', 'date' => '00/00/0000', 'status' => 'completed'],
            ['name' => 'Done', 'date' => '00/00/0000', 'status' => 'completed'],
        ];

        return view('admin.applicant.parent-meeting-track',compact('steps'));
    }
 
 
}
