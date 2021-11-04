<div class="row" >
    <div class="col-md-12">
        <div class="tabbable-line">
            <div class="tab-content">
                <div class="tab-pane active fontawesome-demo" id="tab1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-box" id="card_table" style="display: none">
                                <div class="card-head">
                                    <header>كل الموظفين</header>
                                </div>
                                <div class="card-body ">
                                    <button class="btn btn-outline-success mb-2" id="save_attendance" style=";float: left;" 
                                    data-route="{{ route('attendance.assign_attendence') }}">حفظ</button><br>
                                    <div class="table-scrollable">
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                            id="show_attendance">
                                            <thead class="datatable-head">
                                                <th> # </th>
                                                <th> الاسم </th>
                                                <th> الوظيفة </th>
                                                <th> الغياب </th>
                                                <th> موعد الحضور </th>
                                                <th> موعد الانصراف </th>
                                                <th> الملاحظة </th>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>