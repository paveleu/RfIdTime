 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel Główny
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
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= ile("pracownicy","") ?></h3>

              <p>Pracownicy</p>
            </div>
            <div class="icon">
              <i class="fa fa-group"></i>
            </div>
            <a href="index.php?s=workerlist" class="small-box-footer">Lista <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= ile("log","`data_wyj`='0000-00-00 00:00:00'") ?></h3>

              <p>Obecni</p>
            </div>
            <div class="icon">
              <i class="fa  fa-user"></i>
            </div>
			<a href="#" class="small-box-footer">Aktualnie w parcy </a>
          </div>
          
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= ile("log","") ?></h3>

              <p>Wszystkich wejść</p>
            </div>
            <div class="icon">
              <i class="fa fa-sticky-note"></i>
            </div>
			<a href="index.php" class="small-box-footer">Logi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php
			  $lastcon = new logTime;
			  $res = $lastcon->lastInTime();
			  $res = explode(" ",$res);
			  echo $res[1];
			  ?></h3>

              <p>Ostatnie Weście</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-time" style="margin-top:20px;"></i>
            </div>
            <a href="#" class="small-box-footer">Sprawdź <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  