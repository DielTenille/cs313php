//Hide third div when button is clicked
$(document).ready(function() {
    $("#hideDiv").click(function(){
        $("#thirdDiv").toggle();
    });
});

//Change color based on value in textbox
$(document).ready(function() {
    $("#changeThirdDiv").click(function(){
		var $inputvalue = $("#changeColor3").val();
    	$("#thirdDiv").css("background-color", $inputvalue);
    });
});
