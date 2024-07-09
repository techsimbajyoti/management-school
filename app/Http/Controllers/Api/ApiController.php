<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentParent;
use Hash;

class ApiController extends Controller
{
    public function register(Request $request){
        $data = new StudentParent;
        $data->father_name = $request->father_name;
        $data->father_mobile = $request->father_mobile;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->status = $request->status;
        $data->created_by = $request->created_by;
        $data->role_id = $request->role_id;
        $data->save();

        return response()->json([
            'success' => 'Data inserted successfully',
            'data' => $data
        ]);
        
    }
}
