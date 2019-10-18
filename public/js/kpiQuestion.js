
$(document).ready(function(){
    var inputNumberOfQuestion = $("#inputNumberOfQuestion");
    var questionNumberField = $("#questionNumberField");
    var questionData = $("#questionData");

    var numOfQuestion = 0;
    var isQuestionFormCreated = false;


    inputNumberOfQuestion.keypress(function(){
        $(this).css('border-color', '#cad1d7');
    });


    $('#submitNumOfQBtn').click(function(){
        numOfQuestion = parseInt(inputNumberOfQuestion.val());
        
        if(!numOfQuestion){
            // if the input is not a number 
            inputNumberOfQuestion.css('border-color', 'red');
        }else{
            if(!isQuestionFormCreated){
                isQuestionFormCreated = true;
                createQuestionForm(numOfQuestion);
            }
        }
    });

    function createQuestionForm(numOfQuestionLocal){
        toggleFromQuestionAndNumOfQuestion(true);
        var f = document.createElement("form");
        f.setAttribute('method',"post");
        f.setAttribute('action',"/kpi/question/handleform");

        // get csrf token and append it to the form
        $($("input[name='_token']")[0]).clone().appendTo(f);

        for(j = 0; j < numOfQuestionLocal; j++){
            f.appendChild(createQuestionInput());
        }

        // creaet submit button
        var dev = document.createElement('dev');
        $(dev).css('text-align', 'center');
        $(dev).css('display', 'block');
        $(dev).css('margin-top', '10px');
        var submitBtn = document.createElement('button');
        submitBtn.setAttribute('type', 'submit');
        submitBtn.setAttribute('class', 'btn btn-primary');
        submitBtn.innerText = "create";
        dev.appendChild(submitBtn);
        f.appendChild(dev);

        questionData[0].appendChild(f);
    }

    function toggleFromQuestionAndNumOfQuestion(isQuestionShow){
        if(isQuestionShow){
            questionData.css('display','')
            questionNumberField.css('display', 'none');
        }else{
            questionData.css('display','none')
            questionNumberField.css('display', '');
        }
    }

    function createQuestionInput(){
        var dev = document.createElement("dev");
        var i = document.createElement("input"); //input element, text
        i.setAttribute('type',"text");
        i.setAttribute('name',"questions[]");
        i.setAttribute('placeholder',"Question ");
        i.setAttribute('class', 'form-control questionInput');
        i.setAttribute('required','true');
        dev.appendChild(i);

        var labelRemove = document.createElement("label");
        labelRemove.innerText = "remove";
        labelRemove.setAttribute('class', 'labelRemoveQuestion');
        $(labelRemove).click(function(){
            console.log(numOfQuestion);
            numOfQuestion--;
            if(numOfQuestion <= 0){
                isQuestionFormCreated = false;
                numOfQuestion = 0;
                toggleFromQuestionAndNumOfQuestion(false);
            }
            i.parentElement.remove();
        })
        dev.appendChild(labelRemove);

        return dev;
    }

})