@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student-list'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
        @endif
        <div class="row">
           
            <div class="col-md-12">
                
                    @csrf
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('View Student') }}</h5>
                        </div>
                               
                    </div>
            
                <form action="" method="" enctype="multipart/form-data" >
                    @csrf
                    
                    <div class="card ot-card">
                        <div class="card-header">
                            <h6 class="card-title">{{ __('View Student Details') }}</h6>
                            <div class="d-flex justify-content-end">
                              <a href="{{ route('students')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        <hr style="background-color:#c2c2c2;">

                        <div class="card-body">
                            <h5>Student Information</h5><br>
                            <div class="row mb-3">
                              
                                <div class="col-md-4">
                                   
                                  
                                    <label class="form-label" style="font-weight: 600;">{{ __('Admission No.:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="admission_no" class="form-control" placeholder="Admission No." >
                                        </div>
                                        
                                </div>
                                <div class="col-md-4">
                                  
                                    <label class="form-label" style="font-weight: 600;">{{ __('Parent Name:') }}</label>
                                    <input type="text" name="parent_name" class="form-control" placeholder="Parent Name">
                                    
                                           
                                </div>
                                       
                             
                                <div class="col-md-4">
                                  
                                    <label class="form-label" style="font-weight: 600;">{{ __('First Name:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control" placeholder="Student First Name" >
                                        </div>
                                       
                                </div>

                               
                                         
                               
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-3">
                                  
                                    <label class="form-label" style="font-weight: 600;">{{ __('Last Name:') }}</label>

                                    <div class="form-group">
                                        <input type="text" name="last_name" class="form-control" placeholder="Student Last Name" >
                                    </div>
                                    
                                </div>
                                <div class="col-md-3">
                                  
                                    <label class="form-label" style="font-weight: 600;">{{ __('Email address:') }}</label>
    
                                     <div class="form-group">
                                         <input type="text" name="email" class="form-control" placeholder="Email Address"  value="admin@gmail.com">
                                     </div>
                                     
                                 </div> 
                                 <div class="col-md-3">
                                  
                                     <label class="form-label" style="font-weight: 600;">{{ __('Password:') }}</label>
  
                                      <div class="form-group">
                                          <input type="password" name="password" class="form-control" value="123456789" >
                                          <span style="font-size: 12px;">Default Password: 123456789</span>

                                      </div>
                                     
                                  </div> 
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      
                                        <label class="form-label" style="font-weight: 600;">Gender:</label>
                                        <input type="text" name="gender" class="form-control" value="" placeholder="Gender" >
                                        
                                    </div>
                                </div>
                                  
                            </div>
                            <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" style="font-weight: 600;">{{ __('Class:') }}</label>
                                            <input type="text" name="class" class="form-control" value="" placeholder="Class">
                                        </div>            
                                    </div>    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                          
                                            <label class="form-label" style="font-weight: 600;">Section:</label>
                                            <input type="text" name="section" class="form-control" placeholder="Section">
                                            
                                            
                                        </div>
                                    </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                      
                                        <label class="form-label" style="font-weight: 600;">Date of Birth:</label>
                                        <input name="date_of_birth" value="" type="date" class="form-control date-pick" placeholder="Date of birth">
        
                                    </div>
                                </div>
                                <div class="col-md-3">
                            
                                    <label class="form-label" style="font-weight: 600;">{{ __('Place Of Birth:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="place_of_birth" class="form-control" placeholder="Place Of Birth">
                                        </div>
                                        
                                </div>
                            
                                
                                
                                                  
                            </div>

                            <div class="row mb-3">
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <label class="form-label" style="font-weight: 600;">Blood Group:</label>
                                        <input type="text" class="form-control" name="blood_group" placeholder="Blood Group" >
                                        
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                            
                                        <label class="form-label" style="font-weight: 600;">Religion:</label>
                                        <input type="text" class="form-control" name="religion" placeholder="Religion" >
                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <label class="form-label" style="font-weight: 600;">Category:</label>
                                        <input type="text" name="category" class="form-control" placeholder="Category" >
                                        
                                    </div>
                                </div>
                                 <div class="col-md-3">
                                    
                                    <label class="form-label" style="font-weight: 600;">{{ __('Student Language:') }}</label>
                                    <input type="text" name="student_language" class="form-control" placeholder="Student Language" >
                                    
                                    
                            </div>
                                    
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      
                                        <label class="form-label" style="font-weight: 600;">{{ __('Admission Date') }}</label>
                                        <input type="date" name="admission_date" class="form-control">
                                    </div> 
                                </div>
                                    <div class="col-md-4">
                                        <label class="form-label" style="font-weight: 600;">{{ __('Student Image:') }}</label>
                                        <input type="file" class="form-control" name="image" accept=".png,.jpg,.jpeg" >
                                
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          
                                            <label class="form-label" style="font-weight: 600;">{{ __('Status') }}</label>
                                            <input type="text" name="status" class="form-control" placeholder="Residance status" >
                                            
                                        </div> 
                                    </div>
                            </div>
                            
                            <h5 style="margin-top:30px;">Contact Information</h5><br>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                  
                                    <label class="form-label" style="font-weight: 600;">{{ __('Address:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="residence_address" class="form-control" placeholder="Residance Address" >
                                        </div>
                                        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                
                                        <div class="form-group">
                                          
                                            <label class="form-label" style="font-weight: 600;">{{ __('Country:') }} </label>
                                            <input type="text" name="country" class="form-control" placeholder="country">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          
                                            <label class="form-label" style="font-weight: 600;">{{ __('State:') }} </label>
                                            <input type="text" name="state" class="form-control" placeholder="state">
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    
                                        <label class="form-label" style="font-weight: 600;">{{ __('City:') }}</label>
        
                                            <div class="form-group">
                                                <input type="text" name="city" class="form-control" placeholder="city" >
                                            </div>
                                           
                                    </div>
                                    
                                  
                                
                                 
                                
                            </div>
                            <div class="row mb-3" >
                                <div class="col-md-4">
                                    
                                    <label class="form-label" style="font-weight: 600;">{{ __('Pin Code:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="pin_code" class="form-control" placeholder="Pin Code" >
                                        </div>
                                        
                                </div>
                                <div class="col-md-4">
                                  
                                    <label class="form-label" style="font-weight: 600;">{{ __('Contact:') }}</label>
                                        <div class="form-group">
                                            <input type="text" name="mobile" class="form-control" placeholder="Phone No." >
                                        </div>
                                        
                                </div>
                               
                               <div class="col-md-4">
                                  
                                    <label class="form-label" style="font-weight: 600;">{{ __('Parent Mobile:') }}</label>
                                       <div class="form-group">
                                            <input type="text" name="parent_mobile" class="form-control" placeholder="Parent Mobile" >
                                        </div>
                                       
                                </div> 
                                                   
                               
                            </div>
                            <div class="d-flex justify-content-between align-items-center" style="margin-top:30px;">
                                <h5>View Documents</h5>
                                
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table school_borderLess_table table_border_hide2" id="student-document">
                                            <thead class="table-header" style="border-bottom: 2px solid #dee2e6;">
                                                <tr>
                                                    <th scope="col">Name <span class="text-danger"></span></th>
                                                    <th scope="col">Document <span class="text-danger"></span></th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                          
                            
                            
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
@endsection








                               
                               