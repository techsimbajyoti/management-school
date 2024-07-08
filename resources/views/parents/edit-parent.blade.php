<div class="profile-body edit-parent" style="display:none;">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="title">Edit Profile</h3>
        <a href="{{ route('edit-parent-profile')}}" class="btn btn-lg ot-btn-primary" style="margin-bottom:45px;"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    <div class="profile-body-form">
    <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
            @csrf
            <div class="row">
                <div class="col-md-12">
                
                       
                        <div class="card-body">
                            <form action="" enctype="multipart/form-data" method="" id="visitForm" name="visitForm">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <h6>Father Information</h6><hr>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Father Name <span class="fillable">*</span></label> 
                                    <input class="nice-select niceSelect bordered_style wide" name="father_name" list="datalistOptions" id="exampleDataList" placeholder="Enter father Name" type="text" value="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Father Mobile <span class="fillable">*</span></label> 
                                    <input class="nice-select niceSelect bordered_style wide" name="father_mobile" list="datalistOptions" id="exampleDataList" placeholder="Enter father Mobile" type="text" value="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Father Profession <span class="fillable">*</span></label> 
                                    <input class="nice-select niceSelect bordered_style wide" name="father_profession" list="datalistOptions" id="exampleDataList" placeholder="Enter father profession" type="text" value="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Father Email<span class="text-info"> (username)</span> <span class="fillable">*</span></label> 
                                    <input class="nice-select niceSelect bordered_style wide" name="email" list="datalistOptions" id="exampleDataList" placeholder="Enter father login id" type="text" value="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Father Country</label> 
                                        <input name="father_nationality" id="country" placeholder="Father Nationality" class="nice-select niceSelect bordered_style wide" type="text">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <label class="form-label" for="inputphoto">Photo <span class="text-info">(Accepted images: jpeg,jpg,png.Max file size 2Mb.)</span></label>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="nice-select niceSelect bordered_style wide" type="text" placeholder="Father photo" readonly id="placeholder"> 
                                        <button class="primary-btn-small-input btn ot-btn-primary" type="button">Browse</button>
                                    </div>
            
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label>
                                            <select class="nice-select niceSelect bordered_style wide" name="status" id="validationServer04" aria-describedby="validationServer04Feedback">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                </div>
                                <h6>Mother Information</h6><hr>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Mother Name <span class="fillable">*</span></label> 
                                    <input class="nice-select niceSelect bordered_style wide" name="mother_name" list="datalistOptions" id="exampleDataList" placeholder="Enter mother Name" type="text" value="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Mother Mobile</label> 
                                    <input class="nice-select niceSelect bordered_style wide" name="mother_mobile" list="datalistOptions" id="exampleDataList" placeholder="Enter mother Mobile" type="text" value="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Mother Profession</label> 
                                    <input class="nice-select niceSelect bordered_style wide" name="mother_profession" list="datalistOptions" id="exampleDataList" placeholder="Enter father profession" type="text" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <label class="form-label" for="inputphoto">Photo <span class="text-info">(Accepted images: jpeg,jpg,png.Max file size 2Mb.)</span></label>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="nice-select niceSelect bordered_style wide" type="text" placeholder="Mother photo" readonly id="placeholder2"> 
                                        <button class="primary-btn-small-input  btn ot-btn-primary" type="button">Browse</button>
                                    </div>
                                    
                                    </div>
                                </div>
    
                                <h6>Guardian Information</h6><hr>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Guardian Name <span class="fillable">*</span></label> 
                                    <input class="nice-select niceSelect bordered_style wide" name="guardian_name" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian name" type="text" value="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Guardian Mobile</label> 
                                    <input class="nice-select niceSelect bordered_style wide" name="guardian_mobile" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian mobile" type="text" value="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Guardian Profession</label>
                                     <input class="nice-select niceSelect bordered_style wide" name="guardian_profession" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian profession" type="text" value="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="exampleDataList" class="form-label">Guardian Email</label> 
                                        <input class="nice-select niceSelect bordered_style wide" name="guardian_email" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian email" type="email" value="">
                                        </div>
                                    <div class="col-md-6 mb-3">
                                    <label class="form-label" for="inputphoto">Photo <span class="text-info">(Accepted images: jpeg,jpg,png.Max file size 2Mb.)</span></label>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="nice-select niceSelect bordered_style wide" type="text" placeholder="Guardian photo" readonly id="placeholder2"> 
                                        <button class="primary-btn-small-input btn ot-btn-primary" type="button">Browse</button>
                                    </div>
                                    
                                    </div>
                                   
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Guardian Address</label> 
                                    <input class="nice-select niceSelect bordered_style wide" name="guardian_address" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian address" type="text" value="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Guardian Relation</label> 
                                    <input class="nice-select niceSelect bordered_style wide" name="guardian_relation" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian Relation" type="text" value="">
                                    </div>
                                    
                                    
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-refresh"></i> {{ __('Update') }}</button>
                                        
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                            </form>
                        </div>
            
                </div>
            </div>
        </form>
    </div>
</div>