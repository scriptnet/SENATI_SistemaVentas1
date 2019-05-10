<?php
require 'header.php';
?>

	<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Categoría 
                          	<button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>idarticulo</th>
                            <th>idcategoria</th>
                            <th>codigo</th>
                            <th>nombre</th>
                            <th>stock</th>
                            <th>descripcion</th>
                            <th>imagen</th>
                            <th>condicion</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>idarticulo</th>
                            <th>idcategoria</th>
                            <th>codigo</th>
                            <th>nombre</th>
                            <th>stock</th>
                            <th>descripcion</th>
                            <th>imagen</th>
                            <th>condicion</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                             <div class="form-grup col-lg-6 col-md-6 col-xs-12"> 
                            <label>Categoría(*):</label> 
                             <input type="hidden" name="idarticulo" id="idarticulo" >
                            <select id="idcategoria" name="idcategoria" class="form-control selectpicker" data-live-search="true" required></select> 
                          </div> 
                          
                          <div class="form-grup col-lg-6 col-md-6 col-xs-12" >
                            <label>codigo:</label>
                            
                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="50" placeholder="código de barras" required>
                            <button class="btn btn-success" type="button" onclick="generarbarcode()">Generar</button>
                            <button class="btn btn-info" type="button"  onclick="imprimir()">Imprimir</button>
                              <div id="print">
                                <svg id="barcode"></svg>
                                
                              </div>
                          </div>
                          <div class="form-grup col-lg-6 col-md-6 col-xs-12" >
                            <label>nombre:</label>
                            
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
                          </div>
                          <div class="form-grup col-lg-6 col-md-6 col-xs-12" >
                            <label>stock:</label>
                            
                            <input type="number" class="form-control" name="stock" id="stock" maxlength="50" placeholder="stock" required>
                          </div>
                          <div class="form-grup col-lg-6 col-md-6 col-xs-12" >
                            <label>imagen:</label>
                            
                            <input type="file" class="form-control" name="imagen" id="imagen" maxlength="50" placeholder="imagen" required>
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="100px" id="imagenmuestra">
                          </div>
                          <div class="form-grup col-lg-6 col-md-6 col-xs-12" >
                            <label>Descripción:</label>
                            <input type="text " class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                          </div>
                          
                          <div class="form-grup col-lg-6 col-md-6 col-xs-12">
                            <br>
                            <button class="btn btn-primary" type="submit" name="btnGuardar"> Guardar <i class="fa fa-save"></i></button>
                             <button class="btn btn-danger" onclick="cancelarform()" type="button">Cancelar <i class="fa fa-close"></i></button>
                          </div>
                            

                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/articulo.js"></script>
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/articulo.js"></script>