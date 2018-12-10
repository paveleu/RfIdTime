 <?php

$id = htmlspecialchars($_GET['id']);

$worker = new DB;
$row = $worker->getRekord('SELECT * FROM pracownicy WHERE idprac="'.$id.'"');




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
<div class="col-md-8">
          <div class="box">
            <div class="box-header">
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
                    Od: <?= first($row['idprac']) ?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>
      


    </section>
    <!-- /.content -->

  </div>