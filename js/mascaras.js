$(document).ready(function(){
    $('#cep').mask('00000-000');
    $('#tel1').mask('(00) 00000-0000');
    $('#numero').mask('000000');
    $('#codigo').mask('000000');
    $('#tel2').mask('(00) 00000-0000');
    $('#cpf').mask('000.000.000-00', {reverse: true});

    /**$('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');**/

});