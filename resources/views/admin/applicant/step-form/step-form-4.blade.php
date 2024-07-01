<form id="form4" class="form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="d-flex justify-content-between align-items-center" style="margin-top:30px;">

        <h5>Upload Documents</h5>
        <a id="add-document" class="btn btn-lg ot-btn-primary">
            <i class="fa fa-plus" aria-hidden="true"></i> Add
        </a>
    </div>
    <p class="text-info">Accepted Format : jpeg,jpg,png,pdf,docs. Max file size 2Mb.</p>


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
                        <td>
                            <input type="text" class="form-control" name="document_name[]" placeholder="Enter Document Name">
                        </td>
                        <td>
                            <input type="file" class="form-control" name="document_file[]" multiple accept=".png,.jpg,.jpeg,.pdf,.doc,xls,.docx">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-document">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="card-footer mt-5">
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-lg ot-btn-primary back_3" style="margin-bottom:10px;"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
            <button type="submit" class="btn btn-lg ot-btn-primary" style="margin-bottom:10px;"><i class="fa fa-save"></i> {{ __('Save') }}</button>
        </div>
    </div>
</form>