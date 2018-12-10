 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista Pracowników
        <small>Elektroniczna Ewidencja Czasu Pracy</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Panel Główny</a></li>
        <li class="active">Lista Pracowników</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <div class="box">
            <div class="box-header">
              <h3 class="box-title">Baza Danych Wszystkich Pracowników</h3>
            </div>
            <script>
              $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                  });
                });
              });
            </script>
<!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Szukaj" id="myInput">
              </div>
              </div>
              <div class="col-md-6">
              
            	<a href="?s=addworker"><button type="button" class="btn btn-block btn-success" style="width: auto; margin-bottom: 5px;">Dodaj pracownika</button></a>
              </div>
            </div>

              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">

                <thead>
                <tr role="row">
                	<th style="width: 110px;">Nazwisko</th>
                	<th style="width: 122px;">Imię</th>
                	<th style="width: 92px;">RFID</th>
                	<th style="width: 10px;">Edycja</th>

                </thead>
                <tbody id="myTable">
<?php
$workers = new DB;
$row = $workers->select('SELECT * FROM pracownicy');
echo('<div id="workers">');
foreach($row as $line)
{

?>
<a href="?s=pracownik&id=<?= $line['idprac'] ?>">
              <tr role="row" class="odd">
                  <td class="sorting_1"><?= $line['nazwisko'] ?></td>
                  <td><?= $line['imie'] ?></td>
                  <td><?= $line['rf_id'] ?></td>
                 <td> 
					<div class="btn-group">
                      	<a href="?s=pracownik&id=<?= $line['idprac'] ?>">
                      		<button type="button" class="btn btn-success"><i class="fa fa-fw   fa-lightbulb-o"></i></button>
						</a>
						<a href="?s=workeredit&id=<?= $line['idprac'] ?>">
                      		<button type="button" class="btn btn-warning"><i class="fa fa-fw fa-wrench"></i></button>
                      	</a>
                      	<a href="?s=workeredit&id=<?= $line['idprac']?>&del=1">
                      		<button type="button" class="btn btn-danger"><i class="fa fa-fw  fa-user-times"></i></button>
						</a>
                    </div>
                 </td>
                </tr>
</a>
<?php
}

?>

            </tbody>
                <tfoot>
                <tr><th rowspan="1" colspan="1">Nazwisko</th><th rowspan="1" colspan="1">Imię</th><th rowspan="1" colspan="1">RFID</th><th rowspan="1" colspan="1">Edycja</th></tr>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Pokazano <?= ile("pracownicy","") ?> wyników</div></div>
          </div></div></div>
            </div>
            <!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
  </div>
  
