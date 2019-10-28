

$(document).ready(function(){
    // td selected quetion html
    var tableSelectedQuestion = $("#selected-question-table tbody")
    console.log(tableSelectedQuestion)
    var activateButton = $($('.activate-btn').children())
    
    activateButton.click(function(){
        // when use click on that activate ubtton
        questionStr = $(this).parent().siblings().first().text()
        questionId = $(this).attr('q-id')
        if($(this).attr('aria-pressed') == 'true'){
            // if the button already activated -> remove its associated question in the selected table
            idStr = `#${questionId}`
            $(idStr).remove()
        }else{
            createSelectedQuestion(questionStr, this, questionId)
        }
    })

    function createSelectedQuestion(question, activateBtn, qId){
        var success = false
        var maxScoreModal = $('#max-score-form-modal')

        console.log($(activateBtn).attr('aria-pressed'))
        if($(activateBtn).attr('aria-pressed') == 'true'){
            return;
        }
        showBorderInputMaxScoreError(false)
        $("#max-score-input").val('')
        // trigger modal
        maxScoreModal.modal('show')
        maxScoreModal.on('hidden.bs.modal', function (e) {
            if(!success){
                maxScoreModal.unbind()
                $(activateBtn).trigger('click')
                $("#save_max_score_btn").unbind()
            }
        })

        $("#save_max_score_btn").click(function(){

            inputMaxScore = $("#max-score-input").val()
            if(!isNaN(+inputMaxScore) && +inputMaxScore > 0){
                console.log("nothong")
                var selectedQuestionElement = $(`<tr id='${qId}'><td>${question}</td><td>${inputMaxScore}</td><td class='remove-btn'>remove</td></tr>`);
                success = true
                tableSelectedQuestion.append(selectedQuestionElement)
                // console.log(selectedQuestionElement.children('.remove-btn'));
                $(selectedQuestionElement.children('.remove-btn')[0]).click(function(){
                    
                    maxScoreModal.unbind()
                    $(activateBtn).trigger('click')
                    selectedQuestionElement.remove()
                })
                $("#save_max_score_btn").unbind()
                maxScoreModal.modal('hide')
            }else{
                showBorderInputMaxScoreError(true)
            }
        })
    }
    $("#max-score-input").keypress(function(){
        showBorderInputMaxScoreError(false)
    })

    function showBorderInputMaxScoreError(isDisplay){
        if(isDisplay){
            $("#max-score-input").css('border-color', 'red')
        }
        else{
            $("#max-score-input").css('border-color', 'unset')
        }
    }




    // request with ajax
    $('#submit-kpi-btn').click(function(){

        var token = $("input[name='_token']").val()
        var titleStr = $("#title-input").val()

        var allQuestions = []


        var questionElements = $("#selected-question-table tbody tr")
        $.each(questionElements, (index, value) => {

            var children = $(value).children()
            questinId = parseInt($(value).attr('id'))
            questionStr = children[0].innerText
            maxScoreStr = children[1].innerText
            allQuestions.push({
                id : questinId,
                question : questionStr,
                max_score : maxScoreStr, 
            })
        });
    
        var formData = {
            title : titleStr,
            all_questions : allQuestions,
        }

        console.log(allQuestions)


        $.ajax({
            url: "http://127.0.0.1:8000/kpi/create", 
            beforeSend: function(request) {
                request.setRequestHeader("X-CSRF-Token", token);
                request.setRequestHeader("Accept", "application/json");
            },
            type : 'POST',
            data : JSON.stringify(formData),
            processData: false,
            contentType: 'application/json',
            error: function(jqXHR, textStatus, errorThrown){
                if(jqXHR.status == 422){
                    var errorJson = JSON.parse(jqXHR.responseText).errors
                    var errorToDisplayArr = []
                    console.log(errorJson)
                    if(errorJson.title){
                        errorToDisplayArr.push(errorJson.title)
                    }

                    if(errorJson.all_questions){
                        errorToDisplayArr.push("No question selected")
                    }
                    handleCreateQuestionError(errorToDisplayArr)
                }
            },
            success: function(result){
                location.replace("http://127.0.0.1:8000/kpiManagement")
            }
        });
    })

    function handleCreateQuestionError(errorArr){
        resetErrorDisplay()
        $("#error-message").css('display','')
        var errorPlace = $("#error-message ul")
        for(i = 0; i < errorArr.length ; i++){
            errorPlace.append(createErrorMessageList(errorArr[i]))
        }
    }

    function createErrorMessageList(errorStr){
        return `<li>${errorStr}</li>`
    }

    function resetErrorDisplay(){
        $("#error-message").css('display','none')
        $("#error-message ul").children().remove()
    }

})