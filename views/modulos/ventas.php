  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">        
        <h1>
            Administrar ventas
        </h1>
        <ol class="breadcrumb">
        
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar ventas</li>
        
        </ol>
    </section>

    <section class="content">

      <div class="box">

          <div class="box-header with-border">
            <a href="crear-venta">
              <button class="btn btn-primary">
                Agregar venta 
              </button>
            </a>
          </div>
          
          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablas">
              
              <thead>
                <tr>
                  <th id="first-column-th">#</th>
                  <th>Código factura</th>
                  <th>Cliente</th>
                  <th>Vendedor</th>
                  <th>Forma de pago</th>
                  <th>Neto</th>
                  <th>Total</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
              
                <tr>
                  <td>1</td>
                  <td>1000123</td>
                  <td>Hugo Rafael</td>
                  <td>Alberto Garcia</td>
                  <td>TC ' 123412453462</td>
                  <td>$ 1,000.00</td>
                  <td>$ 1,190.00</td>
                  <td>2020-08-25 12:05:32</td>

                  <td>
                    <div class="btn-group">
                      <button class="btn btn-info"><i class="fa fa-print"></i></button>
                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </td>

                </tr>

              </tbody>

            </table>
          </div>
      </div>

    </section>
  </div>
