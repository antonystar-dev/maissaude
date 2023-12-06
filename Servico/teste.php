<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
    </script>
 <div class="menustyle"><?php
         session_start();
        include '../Login/validaLogin.php';
                    switch ($_SESSION["perfil"]) {
                        case "Administrador":
                            include '../configuracao/menuAdministrador.php';
                            break;
                        case "Funcionario":
                             include '../configuracao/menuFuncionario.php';
                            break;
                        }
                    ?></div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>