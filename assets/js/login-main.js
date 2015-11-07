$(document).ready(function(){

$(".btn-home").click(function(){

  $(this).hide();
  $(this).parent().prev().css("background-size","102px").height("93px").width('97px');
  $(this).parent().next().show();



});
$(".forget-username").click(function(){

    $(this).siblings(".password").hide();
    $(this).siblings(".user-name").hide();
    $(this).siblings(".email-enter").show();
    $(this).hide();
    $(this).siblings(".btn-login").hide();
    $(this).siblings(".btn-reset").show();

});

});
