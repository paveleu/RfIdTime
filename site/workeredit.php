<?php

$id = htmlspecialchars($_GET['id']);

if(isset($_POST['del']))
{
  $logg = htmlspecialchars($_POST['login']);
  $pass = htmlspecialchars($_POST['pass']);
  $con_corect = new LOGIN;
  if($con_corect->corect($logg, $pass))
  {
    $del_con = new DB;
    $del_con -> insert('UPDATE `pracownicy` SET `nazwisko`="Usunięto",`imie`="Usunięto",`rf_id`="",`tel`="" WHERE `pracownicy`.`idprac` = '.$id);
  }
 
}

if ( isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['rfid']) )
{
  $name = htmlspecialchars($_POST['imie']);
  $surname = htmlspecialchars($_POST['nazwisko']);
  $rfid = htmlspecialchars($_POST['rfid']);
  $tel = htmlspecialchars($_POST['tel']);
  
  
  $update = new DB;
  $sql = 'UPDATE `pracownicy` SET `nazwisko`="'.$surname.'",`imie`="'.$name.'",`rf_id`="'.$rfid.'",`tel`="'.$tel.'" WHERE `idprac`="'.$id.'"';
  if($update->update($sql)) $a=true;
  else $a=false;
}


$worker = new DB;
$row = $worker->getRekord('SELECT * FROM pracownicy WHERE idprac="'.$id.'"');




?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista Pracowników
        <small>Elektroniczna Ewidencja Czasu Pracy</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Panel Główny</a></li>
        <li>Lista Pracowników</li>
        <li class="active">Edycja</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <?php

if(isset($_GET['del'])){

?>


<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Aby usunąć pracownika podaj login i chasło!</h3> <br />
              Pracownik: <?= $row['nazwisko'] ?>  <?= $row['imie'] ?><br />
              RF IF: <?= $row['rf_id'] ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Login</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Login" name="login">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Hasło</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Hasło" name="pass">
                  <input type="hidden" value="star" name="del">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-danger btn-lg">Usuń</button>
              </div>
            
          </div></form>
    </div>

<?php

}else{





      if(isset($a))
      {
        if($a)
        { ?>
          <div class="callout callout-info">
        <h4>Edycja wykonana pomyślnie!</h4>

      </div>
       <?php } else 
        { ?>

          <div class="callout callout-info">
        <h4>Błąd edycji!</h4>
      </div>

       <?php }
      }

      ?>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edycja</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="?s=workeredit&id=<?= $id?>" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Imię</label>

                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Imię" name="imie" value="<?= $row['imie']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nzawisko</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nazwisko" name="nazwisko" value="<?= $row['nazwisko']?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Telefon</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Telefon" name="tel" value="<?= $row['tel']?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">RF ID</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="RF ID" name="rfid" value="<?= $row['rf_id']?>">
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Zapisz</button>
              </div>
            </form>
          </div>

<?php

}

?>

    </section>
    <!-- /.content -->
  </div>
