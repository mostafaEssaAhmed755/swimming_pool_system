@include('admin.attendance.components.ajax.search_attendence')
@include('admin.attendance.components.ajax.assign_attendence')

<script>

    $('#reload_table').on('click',function (){
        $('#teacher_attendance').DataTable().ajax.reload(null, false);  //to reloade dataTables

    });
    $('[data-toggle="datepicker"]').datepicker({
        language: 'ar-AE',
        autoPick:true,
        zIndex:500000,
    });

    $(function () {
        $(document).on('mouseover','.basicExample',function(){
            $(this).timepicker();
        });
    });
    
    $(function () {
        $(document).on('mouseover','.attendance_time',function(){
            $(this).timepicker();
        });
    });

    $(document).on('change',".present_attendance",function() {
    if(this.checked) 
    {
       var attendance_time = $(this).parents('td').siblings('td').find('.attendance_time');
       var time = "{{  date("h:ia") }}";
       attendance_time.val(time);
       console.log(attendance_time.val());
    }
    else
    {
        var attendance_time = $(this).parents('td').siblings('td').find('.attendance_time');
        attendance_time.val('');
    }
});

</script>
