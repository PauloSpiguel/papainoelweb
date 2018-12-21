<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <b style="color: #f00; font-weight: 900">SisPNWeb</b> <span style="color: #000; font-weight: 900"> V<?php echo VERSION_SYSTEM; ?></span>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#"><?php echo COMPANY; ?> & P R Spiguel Tecologia</a>.</strong> Todos os direitos Reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Atividades Recentes</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">Configurações Gerais</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
  <script src="../../res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="../../res/admin/bootstrap/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../res/admin/dist/js/app.min.js"></script>
  <!-- Morris.js charts -->
  <script src="../../res/admin/dist/js/raphael.min.js"></script>
  <script src="../../res/admin/dist/js/morris.min.js"></script>
  <script src="../../res/admin/dist/js/printThis.js"></script>
  <!-- DataTables -->
  <script src="../../res/admin/bootstrap/js/jquery.dataTables.js"></script>
  <script src="../../res/admin/bootstrap/js/dataTables.bootstrap.js"></script>
  <script src="../../res/admin/bootstrap/js/dataTables.bootstrap.min.js"></script>

  <script type="text/javascript" charset="utf-8" async defer>

    var myVar;
    function myFunction() {
      myVar = setTimeout(showPage, 2000);
    }
    function showPage() {
      document.getElementById("loader").style.display = "block";
      //document.getElementById("myDiv").style.display = "block";
    }

    $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  //GRAFICO POR LOCAL
  $(window).load(function() {
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#FF0", "#F00", "#8B8378", "#008B8B", "#FF1493", "#191970", "#7B68EE"],
      data: [
      {label: "Em Loco", value: 1},
      {label: "E.M Irmã Osmunda", value: 1},
      {label: "E.M José de Anchieta", value: 1},
      {label: "E.M São José", value: 1},
      {label: "E.M Afonso Belenda", value: 1},
      {label: "CEI Ulisses Pessoa", value: 1},
      {label: "CEI's Menino Jesus", value: 1},
      {label: "Escola Aliança", value: 1},
      {label: "APAE", value: 1},
      ],
      hideHover: 'auto'
    });
  })

  //################ TECLAS DE ATALHO #####################
  shortcut.add("Right",function() 
  {
    //alert("Foi pressionado a seta para a direita!");
  });

  shortcut.add("F9",function() 
  {
   window.location.href="/admin/deliveries/create";
 });

  //################ MODAL #####################
  $('#infoModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipientid = button.data('whatever') // Extract info from data-* attributes
    var recipientnrpassword = button.data('whatevernrpassword') // Extract info from data-* attributes
    var recipientdeskid = button.data('whateverdeskid')  
    var recipientdtbirthday = button.data('whateverdtbirthday')
    var recipientperson = button.data('whateverperson')
    var recipientnrphone = button.data('whatevernrphone')
    var recipientdeslocal = button.data('whateverdeslocal')
    var recipientpublicplace = button.data('whateverpublicplace')
    var recipientnrnumber = button.data('whatevernrnumber')
    var recipientdtpassword = button.data('whateverdtpassword')
    var recipientdtregister = button.data('whateverdtregister')
    var recipientiduser = button.data('whateveriduser')

    //document.write(recipientemail)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text("Senha Papai Noel 2018" + " - ID: " + recipientid)
    modal.find('#nrpassword').text(recipientnrpassword)
    modal.find('#deskid').text(recipientdeskid)
    modal.find('#dtbirthday').text(moment(recipientdtbirthday).format('DD/MM/YYYY'))
    modal.find('#desperson').text(recipientperson)
    modal.find('#deslocal').text(recipientdeslocal)
    modal.find('#nrphone').text(recipientnrphone)
    modal.find('#publicplace').text(recipientpublicplace)
    modal.find('#nrnumber').text(recipientnrnumber)
    modal.find('#dtpassword').text(moment(recipientdtpassword).format('DD/MM/YYYY'))
    modal.find('#dtregister').text(moment(recipientdtregister).format('DD/MM/YYYY HH:mm:ss'))
    modal.find('#iduser').text(recipientiduser)

  })

  // INICIO FUNÇÃO ORDENA TABELA DELIVERIES
  $(function(){
    $('table#myTable tbody tr').hover(
      function(){

        $(this).addClass('destaque');
      },
      function(){
        $(this).removeClass('destaque');
      }
      );
  });
 // INICIO FUNÇÃO BUSCA REPETIDO
 $("#deskid").on('blur', function() {
  buscaRepetido();
});
// INICIO FUNÇÃO CALCULA IDADE
$("#dtbirthday").on('blur', function() {
  calcular_idade();
});
// INICIO FUNÇÃO DE PERQUISA REGISTROS NO BANCO DEMANDS
$("#dtpassword").on('change', function() {
  contaRegistros();
});
//MOSTRA/OCULTA
$('.mostraClass').click(function(){
  $(this).find('i').toggleClass('fa-minus-circle fa-plus-circle')
});
//FUNÇÃO MOSTRA/OCULTA
function mostra(id){
  if(document.getElementById(id).style.display == 'flex'){
    document.getElementById(id).style.display = 'none';
  }else{ document.getElementById(id).style.display = 'flex';}
}

// INICIO FUNÇÃO DE MOSTRA ORGÃO EMISSOR
window.onload=function(){
  var campoRG = document.getElementById('destypedoc').value;
  var display = campoRG == 'RG' ? 'block' : 'none';
  document.getElementById('hidden_div').style.display = display;


  document.getElementById('destypedoc').addEventListener('change', function () {
    var style = this.value == 'RG' ? 'block' : 'none';
    document.getElementById('hidden_div').style.display = style;
  });
}
// INICIO FUNÇÃO DE MASCARA MAIUSCULA
var ignorar = ["das", "dos", "e", "é", "do", "da", "de"];

function caixaAlta(string) {
  return String(string).toLowerCase().replace(/([^A-zÀ-ú]?)([A-zÀ-ú]+)/g, function(match, separator, word) {
    if (ignorar.indexOf(word) != -1) return separator + word;
    return separator + word.charAt(0).toUpperCase() + word.slice(1);
  });
}
function corrigirValor(el) {
  el.value = caixaAlta(el.value);
}
// INICIO FUNÇÃO DE MASCARA MAIUSCULA
function maiuscula(z){
  v = z.value.toUpperCase();
  z.value = v;
}

</script>

</body>
</html>