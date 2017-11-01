$(".phone").mask("+7(999)999-99-99");
$(".date_birth").mask("99.99.9999");

$(document).ready(function() {
    if($('div').is('#errorModalBox')){
        $("#errorModalBox").modal('show');
    }
    if($('div').is('#messageModalBox')){
        $("#messageModalBox").modal('show');
    }    
});