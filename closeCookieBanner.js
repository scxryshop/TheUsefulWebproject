$("#accept-cookie").click(function(){
    document.getElementById("cookie-val").value = "accept";
    $("#submit-cookie").click();
});

$("#decline-cookie").click(function(){
    document.getElementById("cookie-val").value = "decline";
    $("#submit-cookie").click();
});