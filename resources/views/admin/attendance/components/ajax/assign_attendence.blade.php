<script>
    $('#save_attendance').on('click',function(){
        let data = [];
        let route = "{{ route('attendance.assign_attendence') }}";
        let attendance_date =  $('#attendance_date').attr('data-value');
        $('.radio_attendance:checked').each(function(){
            let employee_id = $(this).data('member_id');
            let attendance = $(this).data('attendance');
            let leave_time = $(this).parents('tr').find('.basicExample').val();
            let attendance_time = $(this).parents('tr').find('.attendance_time').val();
            let note = $(this).parents('tr').find('.member_note').val();
            data.push({employee_id:employee_id,attendance:attendance,leave_time:leave_time,attendance_time:attendance_time,note:note});
        });
       $.ajax({
            //this code to update session
            method:'POST',
            url:route,
            data:{data:data,attendance_date:attendance_date},
            beforeSend:function(){
                $('#save_attendance').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){
                toastr.success('Success', 'تم التسجيل بنجاح',{
                                positionClass: 'toast-top-left',
                                });
                $('#save_attendance').removeAttr('disabled'); //to remove button disabled
            },
            error:function (reject){
                //if process unsuccessful
                $('#save_attendance').removeAttr('disabled'); //to remove button disabled
                $.each(reject.responseJSON.errors,function(key,val){
                    //this loop to print any error
                    toastr.error('Error',val[0],{
                                positionClass: 'toast-top-left',
                        });
                });
            },

        });
    });
</script>
