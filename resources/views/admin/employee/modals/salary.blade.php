<!--begin::Modal-->
<div class="modal fade" id="add_salary_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="add_member_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">صرف الراتب للموظف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form id="add_salary">
                    <div class="card-body">
                        <div class="row" style="text-align: right">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>السنة
                                        <span class="text-danger">*</span></label>
                                    <input type="number" name="year" class="form-control" placeholder="السنة" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>الشهر
                                        <span class="text-danger">*</span></label>
                                    <input type="number" name="month" class="form-control" placeholder="الشهر" />
                                </div>
                            </div>
                            
                                                   
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>اجمالي الراتب</label>
                                    <input type="text"  class="form-control" readonly value="{{ $employee->salary }}"  />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>اجمالي الخصومات</label>
                                    <input type="text" id="fines_input" class="form-control" readonly value="{{ $fines }}"  />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>المستحق صرفه </label>
                                    <input type="text" id="salary_paid" class="form-control" 
                                           data-salary="{{ $employee->salary }}"  readonly value="{{ $employee->salary - $fines }}"  />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>صرف الراتب <span class="text-danger">*</span></label>
                                    <input type="text" name="salary" id="salary" class="form-control"   />
                                </div>
                            </div>
                            
                            

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>الملاحظة</label>
                                    <textarea type="text" name="note" class="form-control" placeholder="ملاحظة"> </textarea>
                                </div>
                            </div>
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                        </div>
                    </div>
                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                    <div class="card-footer">
                        <button type="submit" id="submit_button" class="btn btn-primary mr-2">حفظ</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->