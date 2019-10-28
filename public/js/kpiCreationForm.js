

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

})