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
		<div class="col-md-6">
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Obecni w pracy</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Pracownik</th>
				  <th style="width: 150px">Godzina wejścia</th>
                </tr>
				<?php
				
				$obec = obecni();
				if(!empty($obec))
				{
					$a=0;
					foreach($obec as $line)
					{
						$a = $a + 1;
				?>
                <tr>
                  <td><?= $a?></td>
                  <td><?php echo($line['nazwisko']." ".$line['imie']); ?></td>
                  <td>
                  				<?php
			  $res = explode(" ",$line["data"]);
			  echo $res[1];
			  ?>  
                  </td>

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
      	<div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ostatnie 15 wyjść</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Pracownik</th>
				  <th style="width: 120px">Godzina wejścia</th>
				  <th style="width: 120px">Godzina wyjścia</th>
				  <th style="width: 90px">Czas</th>
                </tr>
				<?php
				
				$obec = last15();
				if(!empty($obec))
				{
					$a=0;
					foreach($obec as $line)
					{
						$a = $a + 1;
				?>
                <tr>
                  <td><?= $a?></td>
                  <td><?php echo($line['nazwisko']." ".$line['imie']); ?></td>
                  <td>
                  				<?php
									$res = explode(" ",$line["data"]);
									echo $res[1];
								?>  
                  </td>
				  <td>
                  				<?php
									$res = explode(" ",$line["data_wyj"]);
									echo $res[1];
								?>  
                  </td>
				  <td>
                  				<?php
									$res = explode(" ",$line["czas"]);
									echo $res[1];
								?>  
                  </td>

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
      
	  </div>

    </section>
    <!-- /.content -->
  </div>
  