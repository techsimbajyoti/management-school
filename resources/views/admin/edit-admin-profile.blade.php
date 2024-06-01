<div class="profile-body edit-admin" style="display:none;">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="title">Edit My Profile</h2>
    </div>
    <div class="profile-body-form">
        <form action="" enctype="multipart/form-data" method="" id="visitForm" name="visitForm">
            @csrf
            <div class="row mb-3 mt-3">
                <label class="form-label" for="image">Image: (95 x 95 px)</label>
                <div class="col-md-12">
                <div class="d-flex flex-column align-items-center justify-content-center"><img class="img-thumbnail ot-input-image-preview mb-3" src="{{ url('paper/img/demo.png') }}" alt="Admin"></div>
                <div class="ot_fileUploader left-side mb-3">
                    <input class="form-control" type="text" placeholder="Image" readonly id="placeholder">
                    <button class="primary-btn-small-input" type="button">
                        <label class="btn btn-lg ot-btn-primary" for="fileBrouse">Browse</label> 
                    <input type="file" class="d-none form-control" name="image" id="fileBrouse" accept="image/*"></button>
                </div>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-md-12">
                <div class="row mb-3">
                    <label for="inputname" class="form-label">Name <span class="text-danger">*</span></label>
                    <div class="col-sm-12">
                    <input name="name" type="text" class="form-control ot-input" value="Admin" placeholder="Name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputname" class="form-label">Email</label>
                    <div class="col-sm-12">
                    <input name="email" type="email" class="form-control ot-input" value="admin@gmail.com">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="inputname" class="form-label">Phone <span class="text-danger">*</span></label>
                    <div class="col-sm-12">
                    <input name="phone" type="text" class="form-control ot-input" placeholder="+880 (249) 897 632" value="01811000000">
                    </div>
                </div>
                </div>
                <div class="col-md-12 mt-3">
                <div class="text-end">
                    <button class="btn btn-lg ot-btn-primary"><i class="fa fa-refresh"></i> Update</button>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>
