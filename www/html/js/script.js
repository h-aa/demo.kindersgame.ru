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

$(document).on("click", ".grafik-print", function(){
    var a = $(this).val();
    printDiv(a);
});

$('#new_date').val('');
$(document).on("click", ".grafik-copy", function(){
    $('#new_date').val('');
    var a = $(this).val();
    $('#date_copy').val(a);
    var num_day_week = $(this).attr("data-num-day-week");
    //alert(num_day_week);
    var day_week = [0,1,2,3,4,5,6];
    day_week.splice(num_day_week, 1)
    $('#new_date').datepicker("destroy");
    $('#new_date').datepicker({
        language: 'ru',
        startDate: '+7d',
        daysOfWeekDisabled: day_week,
        daysOfWeekHighlighted: day_week,
        //todayHighlight: true,
        autoclose: true
    });    
    $('#selectDateModalBox').modal('show');
});