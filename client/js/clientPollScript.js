/**
 * Created by Martina on 11/30/2014.
 */


var age;
var gender;
var religion;
var politics;
var relationship;
var json_obj;
var json_obj_final;

var urlHRB = "http://www.finkihrb.zor-komerc.mk/server/parseUserData.php";

$( document ).ready(function() {



    $("#form").submit(function( event ) {

        event.preventDefault();

        if(validateRadioGroups()){
            age = $("#inputAge").val();

            //gender
            if( $("#cb_female").is(":checked")){
                gender = "female";
            }
            else if( $("#cb_male").is(":checked")){
                gender = "male";
            }

            //religion
            if( $("#cb_none").is(":checked")){
                religion = "none";
            }
            else if( $("#cb_christian_other").is(":checked")){
                religion = "christian_other";
            }
            else if( $("#cb_catholic").is(":checked")){
                religion = "catholic";
            }
            else if( $("#cb_jewish").is(":checked")){
                religion = "jewish";
            }
            else if( $("#cb_lutheran").is(":checked")){
                religion = "lutheran";
            }
            else if( $("#cb_mormon").is(":checked")){
                religion = "mormon";
            }

            //politics
            if( $("#cb_conservative").is(":checked")){
                politics = "conservative";
            }
            else if( $("#cb_liberal").is(":checked")){
                politics = "liberal";
            }
            else if( $("#cb_uninvolved").is(":checked")){
                politics = "uninvolved";
            }
            else if( $("#cb_libertanian").is(":checked")){
                politics = "libertanian";
            }

            //relationship
            if( $("#cb_yes").is(":checked")){
                relationship = "yes";
            }
            else if( $("#cb_no").is(":checked")){
                relationship = "no";
            }


            createJsonObjs(age, gender, religion, politics, relationship);

            sendAjax();

        }

        else{
            alert("check all of the radio buttons");
        }



    });




});

function checkRadioGroup(group){
    for(var i=0; i<group.length; i++){
    if(group[i].checked==true){
    return true;
    }
    }
    return false;
    }

function validateRadioGroups(){

    var inputGender = document.getElementsByName("gender");
    var inputReligion = document.getElementsByName("religion");
    var inputPolitics = document.getElementsByName("politics");
    var inputRelationship = document.getElementsByName("relationship");

    var g1 = checkRadioGroup(inputGender);
    var g2 = checkRadioGroup(inputReligion);
    var g3 = checkRadioGroup(inputPolitics);
    var g4 = checkRadioGroup(inputRelationship);

    return g1 && g2 && g3 && g4;
    }

function createJsonObjs(age, gender, religion, politics, relationship){
    json_obj = {"age": age ,"gender": gender ,"religion": religion, "politics": politics, "relationship":relationship };

    var random_uid="test"+Math.floor(Math.random()*1233546)+"aaa";

    json_obj_final = {"uid": random_uid,"user_likes":["aaa","bbb","ccc"], "user_poll_answers": json_obj};
    }

function sendAjax(){
    var request = $.ajax({
    type: "POST",
    url: urlHRB,
    //TODO
    //change url to heroku
    data:{data: json_obj_final}
    });
    request.fail(function( jqXHR, textStatus ) {
    alert( "request failed " + textStatus);
    });
    request.success(function(){
    alert("success");
    //TODO
    //clear fields
    //show modal to say thank you
    });
    }




