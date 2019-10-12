$('.date').datepicker({  
    dateFormat:'yy-mm-dd',
    changeYear:true,
    changeMonth: true,
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