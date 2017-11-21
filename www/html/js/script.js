$(".phone").mask("+7(999)999-99-99");
$(".date_birth").mask("99.99.9999");
$(".date").mask("99.99.9999");

$(document).ready(function() {
    if($('div').is('#errorModalBox')){
        $("#errorModalBox").modal('show');
    }
    if($('div').is('#messageModalBox')){
        $("#messageModalBox").modal('show');
    }    
});

  $(document).on("change", "#u_type", function(){
    var a = $(this).val();
    if(a == 1){
        $("#rights_data").slideDown(50);
        $("#students_data").slideUp(50);
    } else {
        $("#rights_data").slideUp(50);
        $("#students_data").slideDown(50);
    }
  });