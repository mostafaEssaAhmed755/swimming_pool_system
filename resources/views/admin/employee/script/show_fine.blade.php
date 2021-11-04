<script>
    $('#edit_fine').submit(function(e){
        e.preventDefault(); //prevent page reload
        let data = $(this).serialize(); //insert data from form in data variable
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $.ajax({
            //this code to store session
            method:'POST',
            url:"{{ route('fine.edit') }}",
            data:data,
            beforeSend:function(){
                $('#submit_button').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){
                //if process successful
                if(data.error==false)
                {
                    $('#submit_button').removeAttr('disabled'); //to remove button disabled
                    $('#edit_fine')[0].reset(); //to clear form after process
                    $('#all_amount').val(data.amount);
                    $('#fines_input').val(data.amount);
                    $('#salary_paid').val($('#salary_paid').data('salary') - data.amount);
                    $('#show_fee_modal').modal('hide');
                    toastr.success('Success', 'تم الحفظ بنجاح',{
                                    positionClass: 'toast-top-left',
                                });
                }

            },
            error:function (reject){
                //if process unsuccessful
                $('#submit_button').removeAttr('disabled'); //to remove button disabled
                $.each(reject.responseJSON.errors,function(key,val){
                    //this loop to print any error
                    toastr.error('Error',val[0],{
                                positionClass: 'toast-top-left',
                        });
                });
            },
        });
    });

    $('#show_fine').on('click',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $.ajax({
            //this code to store session
            method:'POST',
            url:"{{ route('fine.show') }}",
            data:id,
            success:function (data){
                //if process successful
                $('#all_amount').val(data.amount);
                $('#fines_input').val(data.amount);
                $('#salary_paid').val($('#salary_paid').data('salary') - data.amount);
            },
            error:function (reject){
                //if process unsuccessful
                $('#submit_button').removeAttr('disabled'); //to remove button disabled
                
            },
        });
    });
</script>
