<?php
if ( isset($_POST['imie']) && isset($_POST['nazwisko']) )
{
	$name = htmlspecialchars($_POST['imie']);
	$surname = htmlspecialchars($_POST['nazwisko']);
	if (isset($_POST['rfid']))
	{
		$rfid = htmlspecialchars($_POST['rfid']);
		$dbrfid = new DB;
		$result = $dbrfid->select('SELECT rf_id FROM `pracownicy` WHERE rf_id='.$rfid);

		if (isset($result['0']['rf_id']))
			{
				$rf = 'none';
			} else $rf = $rfid;
	} else $rf = 'none';
	
	unset($dbrfid);
	
	$insert = new DB;
	$sql = 'INSERT INTO `pracownicy` (`idprac`, `nazwisko`, `imie`, `rf_id`) VALUES (NULL, "'.$name.'", "'.$surname.'", "'.$rf.'")';
	if($insert->insert($sql)) $a = true;
	else $a = false;
}

?>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dodawanie Pracownika
        <small>Elektroniczna Ewidencja Czasu Pracy</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Panel Główny</a></li>
        <li class="active">Dodawanie Pracownika</li>
      </ol>
    </section>
<?php
          if(isset($a))
      {
        if($a)
        { ?>
          <div class="callout callout-info">
        <h4>Dodanie wykonane pomyślnie!</h4>

      </div>
       <?php } else 
        { ?>

          <div class="callout callout-info">
        <h4>Błąd dodania!</h4>
      </div>

       <?php }
      }

      ?>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edycja</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="?s=addworker" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Imię</label>

                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Imię" name="imie">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nzawisko</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nazwisko" name="nazwisko">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">RF ID</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="RF ID" name="rfid">
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Zapisz</button>
              </div>
            </form>
          </div>


    </section>
    <!-- /.content -->
  </div>
