function showCategory(id){
    if(document.getElementById("category-content-box-"+id).style.display == "none"){
       $("#category-content-box-"+id).slideDown( "slow", function() {
            $("#category-content-box-"+id).fadeIn("slow");
        });
        $("#chevron-compact-down-"+id).fadeOut(500);
        setTimeout(function(){
            $("#chevron-compact-up-"+id).fadeIn("slow");
        }, 500);
    }else{
        $("#category-content-box-"+id).slideUp( "slow", function() {
            $("#category-content-box-"+id).fadeOut("slow");
        });
        $("#category-content-box-"+id).fadeOut("slow");
        
        $("#chevron-compact-up-"+id).fadeOut(500);
        setTimeout(function(){
            $("#chevron-compact-down-"+id).fadeIn("slow");
        }, 500);
    } 
}