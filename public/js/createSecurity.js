$('.date').datepicker({  
    dateFormat:'yy-mm-dd',
    changeYear:true,
    changeMonth: true,
    yearRange: '1945:'+(new Date).getFullYear(),
    autoclose: true,
    todayHighlight: true,
    todayBtn: true,
    keyboardNavigation:true,
    todayBtn: 'linked'
});
var currentDate = new Date();  
$("#datepicker").datepicker("setDate",currentDate);      
$('#datepicker').change(function () {
	console.log(this.value);         
});
function deleletInspectiolist() {
        var del=confirm("Are you sure you want to delete this record?");
        if (del==true){
            alert ("record deleted")
        } else {
            alert("Record Not Deleted")
        }
    }
$('#security_profile_img').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})