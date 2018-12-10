 <?php

$id = htmlspecialchars($_GET['id']);


if(isset($_POST['addinfo'])){
	
	$addinfo = htmlspecialchars($_POST['addinfo']);
  
  
  $update = new DB;
  $sql = 'UPDATE `pracownicy` SET `addinfo`="'.$addinfo.'" WHERE `idprac`="'.$id.'"';
  if($update->update($sql)) $a=true;
  else $a=false;
	
}




$worker = new DB;
$row = $worker->getRekord('SELECT * FROM pracownicy WHERE idprac="'.$id.'"');

 $addinfo = str_replace("
 ","<br />",  $row['addinfo']);


?>
 
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pracownik
        <small>Elektroniczna Ewidencja Czasu Pracy</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Panel Główny</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
      <!-- Default box -->
<div class="row">
<div class="col-md-8">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pracownik</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th>Nazwisko</th> <th><?= $row['nazwisko'] ?> </th>
                </tr>
                <tr>
                  <td><b>Imię</b></td><td><b><?= $row['imie'] ?></b></td>
                </tr>
                <tr>
                  <td>Telefon</td><td><?= $row['tel'] ?></td>
                </tr>
				<tr>
                  <td>RF ID</td><td><?= $row['rf_id'] ?></td>
                </tr>
				<tr>
                  <td>Informacje Dodatkowe <a type="button" class="btn btn-block btn-success btn-xs" style="width: 60px" data-toggle="modal" data-target="#modal-default">Edytuj</a></td><td><?= $addinfo ?></td>
                </tr>

              </tbody></table>
			  <div class="btn-group" style="margin-top: 5px;">
						<a href="?s=workeredit&id=<?= $row['idprac'] ?>">
                      		<button type="button" class="btn btn-warning"><i class="fa fa-fw fa-wrench"></i>Edytuj</button>
                      	</a>
                      	<a href="?s=workeredit&id=<?= $row['idprac']?>&del=1">
                      		<button type="button" class="btn btn-danger"><i class="fa fa-fw  fa-user-times"></i>Usuń</button>
						</a>
                    </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
<div class="col-md-4">
<div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Wszystkich wejść</span>
              <span class="info-box-number"><?= ile('log','`idprac` = "'.$row['idprac'].'"') ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 0%"></div>
              </div>
              <span class="progress-description">
                    Od: <?= first($id) ?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Raporty </h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<form action="?s=pracownik&id=<?= $id ?>" method="post">
						<label>Zakres:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right" id="reservation" name="data">
							</div>
							<input type="submit" class="form-control pull-right" id="wyslij" value="Generuj">
					</form>
				</div>
			</div>			
        </div>
            <!-- /.footer -->
    </div>
	
	<?php
	if(isset($_POST['data'])){
		if($_POST['data'] !== "")
		{
			$data = explode(" - ",$_POST['data']);
			$data[0] = explode("/",$data[0]);
			$data[1] = explode("/",$data[1]);
			$a = 'AND (data BETWEEN "'.$data[0][2].'-'.$data[0][0].'-'.$data[0][1].' 00:00:00 " AND "'.$data[1][2].'-'.$data[1][0].'-'.$data[1][1].' 23:59:59") ';
		} else $a = '';
		
		$sql = "SELECT * FROM `log` WHERE `idprac` = $id ".$a;
		
		$rapcon = new DB;
		$obec = $rapcon->select($sql);
	?>
	
	
	<div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Raport <small>Od: <?= $data[0][2].'-'.$data[0][0].'-'.$data[0][1] ?> Do: <?= $data[1][2].'-'.$data[1][0].'-'.$data[1][1] ?> </small></h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Data Wejścia</th>
				  <th>Godzina Wejścia</th>
				  <th>Data Wyjścia</th>
				  <th>Godzina wyjścia</th>
				  <th>Czas</th>
                </tr>
				<?php
				
				
				if(!empty($obec))
				{
					$a=0;
					foreach($obec as $line)
					{
						$a = $a + 1;
						$time1 = explode(" ", $line['data']);
						$time2 = explode(" ", $line['data_wyj']);
				?>
                <tr>
                  <td><?= $a?></td>
                  <td><?= $time1[0] ?></td>
				  <td><?= $time1[1] ?></td>
				  <td><?= $time2[0] ?></td>
				  <td><?= $time2[1] ?></td>
				  <td><?= $line['czas'] ?></td>
                </tr>
				<?php
					}
				}
				?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	</div>
	<?php
	}
	?>
</div>
      

	  
<div class="modal fade" id="modal-default" style="display: none;">
<form action="?s=pracownik&id=<?= $id ?>" method="post">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edycja Informacji dodatkowych</h4>
              </div>
              <div class="modal-body">
			  
                <p><textarea class="form-control" rows="3" placeholder="Informacje Dodatkowe" style="margin: auto; width: 400px; height: 100;" name="addinfo"><?= $row['addinfo'] ?></textarea></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Zamknij</button>
                <button type="submit" class="btn btn-primary">Zapisz</button>
			
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
		  </form>
        </div>

    </section>
    <!-- /.content -->


  </div>