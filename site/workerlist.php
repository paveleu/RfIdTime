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
            <!-- /.box-header -->
            <div class="box-body">
            	<a href="?s=addworker"><button type="button" class="btn btn-block btn-success" style="width: auto; margin-bottom: 5px;">Dodaj pracownika</button></a>
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">

                <thead>
                <tr role="row">
                	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 110px;">Nazwisko</th>
                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 122px;">Imię</th>
                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 92px;">RFID</th>
                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 10px;">Edycja</th>

                </thead>
                <tbody>
<?php
$workers = new DB;
$row = $workers->select('SELECT * FROM pracownicy');
echo('<div id="workers">');
foreach($row as $line)
{

?>
              <tr role="row" class="odd">
                  <td class="sorting_1"><?= $line['nazwisko'] ?></td>
                  <td><?= $line['imie'] ?></td>
                  <td><?= $line['rf_id'] ?></td>
                 <td> 
					<div class="btn-group">
						<a href="?s=workeredit&id=<?= $line['idprac'] ?>">
                      		<button type="button" class="btn btn-warning"><i class="fa fa-fw fa-wrench"></i></button>
                      	</a>
                      	<a href="?s=workeredit&id=<?= $line['idprac']?>&del=1">
                      		<button type="button" class="btn btn-danger"><i class="fa fa-fw  fa-user-times"></i></button>
						
                    </div>
                 </td>
                </tr>
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
  

<?php
/**
$workers = new DB;
$row = $workers->select('SELECT * FROM pracownicy');
echo('<div id="workers">');
foreach($row as $line)
{

	print('<div class="row_worker ">'.$line['nazwisko'].$line['imie'].$line['rf_id'].'<a href="?s=workeredit&id='.$line['idprac'].'">  Edytuj  </a> </div>');
}
echo('</div>');

