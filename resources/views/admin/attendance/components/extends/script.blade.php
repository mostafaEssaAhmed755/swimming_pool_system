@include('admin.attendance.components.ajax.script')
<script>
    
    $(document).on('change',".present_attendance",function() {
    if(this.checked) 
    {
       var attendance_time = $(this).parents('td').siblings('td').find('.attendance_time');
       var time = "{{  date("h:ia") }}";
       attendance_time.val(time);
    }
  
}); 

$(document).on('change',".absent_attendance",function() {
    if(this.checked) 
    {
       var attendance_time = $(this).parents('td').siblings('td').find('.attendance_time');
       attendance_time.val('');
    }
  
});

$(document).on('click',".btn_leave ",function() {
    if ($(this).is(':checked')) 
    {
        var item = $(this).parents('.input-leave-siblings').siblings('.input-leave').find('.basicExample');
        item.val("{{ date("h:ia") }}");
    }
    else
    {
        var item = $(this).parents('.input-leave-siblings').siblings('.input-leave').find('.basicExample');
        item.val('');
    }
      
});
</script>
