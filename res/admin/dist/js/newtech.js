 /**
  * CRIAÇÃO DE JS PERSONALIZADOS
  */
 
// INICIO FUNÇÃO BUSCA REPETIDOS
function buscaRepetido() {
  var busca = $("#deskid").val();
  if (busca.length < 4){
    swal({
      title: "Atenção?",
      text: "Nome digitado é inválido ou vázio!",
      type: "warning",
      showCancelButton: false,
      confirmButtonClass: 'btn-danger',
      confirmButtonText: 'OK',
      cancelButtonText: "No, cancel operação!",
      closeOnConfirm: true,
      closeOnCancel: false
    },
    function(isConfirm){
      if (isConfirm){
        document.getElementById('deskid').focus();
      } else {
        document.getElementById('deskid').focus();
      }
    });
  }else{
    $.post('../../vendor/hcodebr/php-classes/src/DB/Double.php', {busca: busca}, function(data){
      if(data != 'não cadastrado'){
        var datetime = data;
        swal({
          title: "Atenção? Nome informado já contem registrado.",
          text: datetime + " Deseja continuar?",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Sim',
          cancelButtonText: "Não, Cancelar e sair!",
          closeOnConfirm: true,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            document.getElementById('dtbirthday').focus();
          } else {
            window.location.href="/admin/deliveries";
          }
        });
      }

    });

  }    
}
 // INICIO FUNÇÃO CALCULA IDADE
 function calcular_idade() {
  if ($('#dtbirthday').val() != '') {
    var dataInput = new Date($("#dtbirthday").val());
    if (!isNaN(dataInput)) {
      var dataAtual = new Date();
      var diferenca = dataAtual.getFullYear() -
      dataInput.getFullYear();
      $("#calcYear").val(diferenca);
      if(diferenca > 10){       
        var r=confirm("Idade acima do permitido! Deseja continuar mesmo assim?");
        if (r==true)
        {
          $("#calcYear").val(diferenca);
          return true;
        }
        else
        {
          $("#calcYear").val('Data inválida');
          window.location.href="/admin/deliveries";
          return false; 
        }
      }
    }
  }
}
  // INICIO FUNÇÃO DE PERQUISA REGISTROS NO BANCO DEMANDS
  function contaRegistros() {
    var dados = $("#dtpassword").serialize();
    $.ajax({
      url : '../../vendor/hcodebr/php-classes/src/DB/Search.php',
      method : 'POST',
      data: dados,
      dataType: 'html',
      deforeSend: function(){
        $("#passDelivery").val('Aguarde...');
      },
      success: function(data){
        if(data.passDelivery = true) {
         $("#passDelivery").empty().val(data);
       }else{
        alert(data);
      }
    }
  });
    return false;    
  }
  // PREENCHE VALOR TABELA LANÇAMENTOS LOCAIS
  function countLocals(locals) {
    alert(locals);
    /*var dados = $("#mylocals").serialize();
    $.ajax({
      url : '../../../../vendor/hcodebr/php-classes/src/Advanced/countLocals.php',
      method : 'POST',
      data: dados,
      dataType: 'html',
      success: function(data){
        if(data.countByLocals = true) {
         $("#countByLocals").empty().val(data);
       }else{
        alert(data);
      }
    }
  });
    return false;*/    
  }
  /*$(document).ready( function() {
    $('#dtpassword').change(function(){
      var dados = $(this).serialize();
      $.ajax({
        url : '../../vendor/hcodebr/php-classes/src/DB/Search.php',
        method : 'POST',
        data: dados,
        dataType: 'html',
        deforeSend: function(){
          $("#passDelivery").val('Aguarde...');
        },
        success: function(data){
          if(data.passDelivery = true) {
           $("#passDelivery").empty().val(data);
         }else{
          alert(data);
        }
      }
    });
      return false;    
    })
  });*/