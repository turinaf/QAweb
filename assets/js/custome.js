$(document).ready(function() {
    $("#login").click(function () {
        $(".signup-cover").hide();
        $(".login-cover").show();
    })
    $("#signup").click(function () {
        $(".login-cover").hide();
        $(".signup-cover").show();
    })
})