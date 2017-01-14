//Hide div content when button is clicked
$(document).ready(function() {
    $("#arrow1").click(function(){
      $(".fa fa-angle-double-down").toggleClass("fa fa-angle-double-down", "fa fa-angle-double-up");
        $("#div2-content").toggle();
    });
});
$(document).ready(function() {
    $("#arrow2").click(function(){
      $(".fa fa-angle-double-down").toggleClass("fa fa-angle-double-down fa fa-angle-double-up");
        $("#div3-content").toggle();
    });
});


