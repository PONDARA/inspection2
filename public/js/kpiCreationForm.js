

$(document).ready(function(){
    // td selected quetion html
    var tableSelectedQuestion = $("#selected-question-table tbody")
    console.log(tableSelectedQuestion)
    var activateButton = $($('.activate-btn').children())
    
    activateButton.click(function(){
        questionStr = $(this).parent().siblings().first().text()
        questionId = $(this).attr('q-id')
        if($(this).attr('aria-pressed') == 'true'){
            idStr = `#${questionId}`
            $(idStr).remove()
        }else{
            createSelectedQuestion(questionStr, 9, this, questionId)
        }
    })

    function createSelectedQuestion(question, maxScore, activateBtn, qId){
        // console.log($($(activateBtn).children()[0]).attr('aria-pressed'));
        if($(activateBtn).attr('aria-pressed') == 'true'){
            return 
        }
        var selectedQuestionElement = $(`<tr id='${qId}'><td>${question}</td><td>${maxScore}</td><td class='remove-btn'>remove</td></tr>`);

        tableSelectedQuestion.append(selectedQuestionElement)
        // console.log(selectedQuestionElement.children('.remove-btn'));
        $(selectedQuestionElement.children('.remove-btn')[0]).click(function(){
            $(activateBtn).trigger('click')
            selectedQuestionElement.remove()
        })
    }

})