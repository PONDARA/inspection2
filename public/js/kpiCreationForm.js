

$(document).ready(function(){
    // td selected quetion html
    var tableSelectedQuestion = $("#selected-question-table tbody")
    console.log(tableSelectedQuestion)
    var activateButton = $($('.activate-btn').children())
    putClickEventToActivateBtn();

    
    function putClickEventToActivateBtn(){
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
    }

    function clearClickEventToActivateBtn(){
        activateButton.unbind();
    }

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
            url: "/kpi/create", 
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

                $("#create-kpi-success-modal").modal('show')
                $("#create-kpi-success-modal").on('hidden.bs.modal', function (e) {
                    location.replace("/kpiManagement")
                }) 
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



    // handle create question
    var addQuestionFormModal = $("#add-question-form-modal")
    var submitQuestion = $("#add-question-form-btn")

    var questionInput = $("#question-input")
    var objectiveInput = $("#objective-input")
    var categorySelect = $("#category-select")


    // request category list
    $("#add-qusetion-btn").click(function(){
        questionInput.val('')
        objectiveInput.val('')
        $.ajax({
            url: "/kpi/question-cateogry", 
            beforeSend: function(request) {
                request.setRequestHeader("Accept", "application/json");
            },
            type : 'GET',
            processData: false,
            contentType: 'application/json',
            error: function(jqXHR, textStatus, errorThrown){
                console.log(jqXHR.status)
            },
            success: function(result){
                handleGetCategorySuccess(result)
            }
        });
    })


    function handleGetCategorySuccess(categoryList){
        categorySelect.empty()
        for(i = 0;i < categoryList.length; i++){
            var id = categoryList[i].id
            var name = categoryList[i].name
            var option = `<option value=${id}>${name}</option>`
            categorySelect.append(option)
        }

        addQuestionFormModal.modal('show')
    }


    submitQuestion.click(function(){
        console.log(categorySelect.val())

        var token = $("input[name='_token']").val()
        var questionStr = questionInput.val()
        var objectiveStr = objectiveInput.val()
        var cateId = categorySelect.val()
        var cateTitle = categorySelect.find(":selected")[0].innerText

        var formData = {
            question : questionStr,
            objective : objectiveStr,
            question_cat_id : cateId
        }

        // submit new question
        $.ajax({
            url: "/questionStore", 
            beforeSend: function(request) {
                request.setRequestHeader("X-CSRF-Token", token);
                request.setRequestHeader("Accept", "application/json");
            },
            type : 'POST',
            data : JSON.stringify(formData),
            processData: false,
            contentType: 'application/json',
            error: function(jqXHR, textStatus, errorThrown){
                console.log(jqXHR.status)
            },
            success: function(result){
                // add that question to the table
                handleCreateFunctionSuccess(result, cateTitle, questionStr, objectiveStr)
                console.log(result)
            }
        });
    })

    function handleCreateFunctionSuccess(result, cateTitle, question, objective){

        var placeToPut =$(`#nav-${cateTitle} table tbody`)

        // if(!objective){
        //     objective = '-------'
        // }

        var newQuestionElement = $(`                                          
         <tr>
            <td>${question}</td>
            <td>${objective}</td>
            <td class="activate-btn"> 
                <button type="button" q-id="${result.question_id}-q" class="my-activate-btn btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="false" autocomplete="off">
                    <div class="handle"></div>
                </button>
            </td>
        </tr>
        `)

        placeToPut.append(newQuestionElement)
        addQuestionFormModal.modal('hide')

        // handle click listener on activate btn once again (reset the existen)
        var thisActivateBtn = newQuestionElement.find('.my-activate-btn');
        clearClickEventToActivateBtn()
        activateButton.push(thisActivateBtn[0])
        putClickEventToActivateBtn()

        thisActivateBtn.trigger('click')
    }

})