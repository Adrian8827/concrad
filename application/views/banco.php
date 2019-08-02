<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Concrad</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i>Salir</a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar s_left" >
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo site_url()?>">
                    <i class="fas fa-donate"></i>
                    Cuentas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('/banco')?>">
                    <i class="fas fa-piggy-bank" ></i>
                    Bancos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user"></i>
                    usuarios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Reportes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-credit-card"></i>
                    Tarjetahabientes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-chart-pie"></i>
                    Estadisticas
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Bancos</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-secondary" onclick="showagregar()"> <i class="fas fa-plus-circle"></i> Agregar Banco</button>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <table id="example" class="hover" s>
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Nombre Corto</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Clave</th>
                        <th>Nombre Corto</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>        
            </table>                    
        </div>          
        </main>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="modalbanco" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formbanco" name="formbanco">
            <input type="hidden" name="id_edit" id="id_edit">
            <div class="form-group">
                <label >Clave</label>
                <div>
                    <input id="clave" name="clave" class="form-control" type="text" value="">
                </div>
            </div> 
            <div class="form-group">
                <label >Nombre Corto</label>
                <div>
                    <input id="nombre_corto" name="nombre_corto" class="form-control" type="text" value="">
                </div>
            </div> 
            <div class="form-group">
                <label >Banco</label>
                <div>
                    <input id="banco" name="banco" class="form-control" type="text" value="">
                </div>
            </div> 
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="guardar()" id="btnguardar" name="btnguardar" >Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script src="<?php echo base_url('assets/js/banco.js')?>"></script>   
</body>
</html>