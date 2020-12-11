$(document).ready(function() {

    if ($("#datetimepicker").length != 0) {
      $('#datetimepicker').datetimepicker({
        icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-chevron-up",
          down: "fa fa-chevron-down",
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-screenshot',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
        }
      });
    }

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  });

  $(document).ready(function (){
    $("#service_price").mask("R$ 009,00");
    $("#cpf").mask("000.000.000-00");
    $("#rg").mask("00.000.000-0");
    $("#phone").mask("(00) 00009-0000")
    $("#phone").blur(function(event){
      if($(this).val().lenght == 15){
        $("#phone").mask("(00) 00000-0009")
      }else{
        $("#phone").mask("(00) 0000-00009")
      }
    })
  });

  $(function(){
            $("#cep").autocompleteAddress();
        });

  $(document).ready(function (){
    $("#cep").mask("00000-000");
  });

  function alerta(){
   swal("Sucesso!", "Comentário enviado com sucesso", "success");
  }

  
$(document).ready(function(){
$(".book").click(function(){
var timeslot = $(this).attr("data-timeslot");
$("#slot").html(timeslot);
$("#timeslot").val(timeslot);
$("#myModal").modal();
});
});

function exibeDiv(){
var div = document.getElementById("imprimir");
div.style.display = "none";
}
