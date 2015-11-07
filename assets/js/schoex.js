
$(function() {
    "use strict";

    var latestOne ;
    $(".aj").click(function(e) {
        if($(this).attr('href') != latestOne){
            latestOne = $(this).attr('href');
            showHideLoad();
        }
    });

    $("#chgAcademicYear").click(function(e) {
        $('#myModal').modal('show');
    });
	


});

var showHideLoad = function(hideIndicator) {
    if (typeof hideIndicator === "undefined" || hideIndicator === null) {
        $('#overlay').show();
    }else{
        $('#overlay').hide();
    }
}
