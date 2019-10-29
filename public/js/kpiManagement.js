
$(document).ready(function(){
    $(".deactivate-btn").click(function(e){
        e.preventDefault()
        var kpiStatusEle = $($(this).parent().parent().parent().siblings('.kpi-status'))
        console.log(kpiStatusEle)
        var kpiId = kpiStatusEle.attr('kpi-id')
        var token =  $("input[name='_token']").val()
        var btn = this;
        var formData = {
            kpi_id : kpiId
        }

        $.ajax({
            url: "/kpi/deactivate", 
            beforeSend: function(request) {
                request.setRequestHeader("X-CSRF-Token", token);
                request.setRequestHeader("Accept", "application/json");
            },
            type : 'POST',
            data : JSON.stringify(formData),
            processData: false,
            contentType: 'application/json',
            error: function(jqXHR, textStatus, errorThrown){
                console.log("jqXHR staus " + jqXHR.status)
            },
            success: function(result){
                handleDeactivateSucess(kpiStatusEle);
                $(btn).remove();
            }
        });
    })
    
    function handleDeactivateSucess(statusEle){
        console.log("here")
        statusEle.text("inactive")
        statusEle.attr('class', 'status')
    }
})