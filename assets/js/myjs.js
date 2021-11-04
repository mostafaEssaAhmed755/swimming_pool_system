setTimeout(function() {
    $('.alert_box_message').fadeOut('fast');
  }, 5000); 
  setTimeout(function() {
    $('.alert_box_message_moreTime').fadeOut('fast');
  }, 10000); 
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#uid').val(new Date().getTime().toString().slice(0,12));

if(window.location.pathname == '/preparingsession/create'){
    $('#gymnastic').change(function(){
      send_gymnastic_id()
    })
}else if(window.location.pathname.slice(0,31) == '/preparingsession/createStudent'){

    scanBbarcode()
}else if(window.location.pathname == '/'){
    let barcodeInput = new Date().getTime().toString().slice(0,12);
    $('#printButton').on('click',function(){
      printTicket('ticket');
      storeTicketId(barcodeInput);
    });

    JsBarcode("#barcodeOutput", barcodeInput,{
      format: "EAN13",  
      width: 2,
      height: 25,
      fontSize: 15,});
    $("#barcodeOutput").css('width','100%');
    scanBbarcode()

}else if(window.location.pathname.slice(0,8) == '/student'){
  JsBarcode(".barcode").init();

  $("#eleClicked").click(function(e){
    e.preventDefault();
    $("#inputImg").trigger('click');
  });
  $( "#inputImg" ).change(function() {
    $('#formDate').trigger('submit');
  });

}else if(window.location.pathname.slice(0,16) == '/preparingsessio'){
  onScan.attachTo(document);
  document.addEventListener('scan', function(sScancode) {
      let barcode = sScancode.detail.scanCode.slice(0,12);
      // send uid
      send_student_barcode(barcode);
      // reload page
    
  });
}else if(window.location.pathname.slice(0,9) == '/employee'){
  $("#eleClicked").click(function(e){
    e.preventDefault();
    $("#inputImg").trigger('click');
    
  });
  $("#inputImg").change(function() {
    $('#formDate').trigger('submit');
  });
}


function printTicket(eleName){
  w=window.open();
  w.document.body.innerHTML=$('#'+eleName).html();
  w.document.body.setAttribute('dir','rtl');
  w.print();
  w.close();
}
// send request to store ticket UID
function storeTicketId(id){
  $.ajax({
    method:'POST',
    url: 'http://127.0.0.5/ticket',
    data:{
      uid:id},
    success: function (data) { 
      alertMsg(data.msg,data.status);
      location.reload();

    }
  });
}

function send_gymnastic_id(){
  $.ajax({
    method:'GET',
    dataType: "json",
    url: 'http://127.0.0.5/preparingsession/getTraningDates/'+$('#gymnastic').find(":selected").val(),
    success: function (data,status,xhr) { 
      $('#trainingdate_id').html = ' ';
      if(data.length == 0){
        // create message box
        alertMsg('لا توجد مواعيد اخري لهذا التمرين',400);
        $('#trainingdate_id').append($('<option disabled selected hidden>لا توجد مواعيد اخري لهذا التمرين</option>')); 
      }
      data.forEach(item => {
        $('#trainingdate_id').append($('<option value ="'+item.id+'">'+' من '+ tConvert (item.from.slice(0,5)) +' الى '+ tConvert (item.to.slice(0,5))+'</option>'));

      });
    }
  });
}
function send_student_barcode(uid){
  $.ajax({
    method:'POST',
    dataType: "json",
    url: 'http://127.0.0.5/preparingsession/storeStudent/'+$('#preparingsessionID').val(),
    data:{uid:uid},
    success: function (data) { 
      // alert
      alertMsg(data.msg,data.status);
      setTimeout(() => {
        location.reload();
      }, 7000);


    }
  });
}
function tConvert (time) {
// Check correct time format and split into components
time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

if (time.length > 1) { // If time format correct
  time = time.slice (1);  // Remove full string match value
  time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
  time[0] = +time[0] % 12 || 12; // Adjust hours
}
return time.join (''); // return adjusted time or original string
}
function alertMsg(msg,status){
  let success = 'alert alert-success  alert_box_message',
      danger  = 'alert alert-danger  alert_box_message',
       msgbox = document.createElement('div');

  if(status){
    msgbox.innerText = msg;
    msgbox.className = success;
  }else{
    msgbox.innerText = msg;
    msgbox.className = danger;
  }
  $('.page-content-wrapper').append(msgbox)
  setTimeout(function() {
    $('.alert_box_message').fadeOut('fast');
  }, 5000); 
}
function scanBbarcode(){
  onScan.attachTo(document);
  document.addEventListener('scan', function(sScancode) {
      $('#barcodeInput').val(sScancode.detail.scanCode.slice(0,12));
  });
}
