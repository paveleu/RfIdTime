<?php
 if(isset($_GET['edit'])) $id = htmlspecialchars($_GET['edit']);

if(isset($_POST['login'])&&isset($_POST['pass']))
{

$login = htmlspecialchars($_POST['login']);
$pass = md5(htmlspecialchars($_POST['pass']));
$sql = "INSERT INTO user (nameuser, passuser) VALUES ('$login','$pass') ";
$adcon = new DB;
$adcon ->insert($sql);

}

if(isset($_POST['loginedit'])){
  $login=htmlspecialchars($_POST['loginedit']);
  $sql = 'UPDATE `user` SET `nameuser`="'.$login.'" ';
  if($_POST['passedit']!==""){
    $sql = $sql.'`passuser` = "'.md5(htmlspecialchars($_POST["passedit"])).'" ';
  }

  $sql = $sql. 'WHERE `iduser` = '.$id;

    $con = new DB;
    $con-> insert($sql);

}

$workers = new DB;
$row = $workers->select('SELECT nameuser, iduser FROM user');

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
        Lista Użytkowników
        
      <small>Elektroniczna Ewidencja Czasu Pracy</small>
    </h1>
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-dashboard"></i> SYSTEM
      </li>
      <li class="active">Lista użytkowników</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <?php
if(isset($_GET['edit'])){
$id = htmlspecialchars($_GET['edit']);


      ?>
                  <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
              <h3 class="box-title">Edytuj</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Login</label>

                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Login" name="loginedit" value="<?= $row[$id]['username'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Hasło <small style="font-weight: normal;">Pozostaw puste by nie zmieniać</small></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Hasło" name="passedit">
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Zapisz</button>
              </div>
            </form>
              </div>
            </div>
        <?php
}
        ?>
      <div class="col-md-4">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Lista użytkowników</h3>
          </div>
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
                <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row">
                        <th style="width: 10px;">#</th>
                        <th style="width: 100px;">Nazwa</th>
                        <th style="width: 100px;">Edycja</th>
                      </tr>
                      </thead>
                      <tbody id="myTable">
                        <?php


                          echo('<div id="workers">');
                          $a=0;
                          foreach($row as $line)
                            {
                            $a++;
                        ?>
                              <tr role="row" class="odd">
                               <td><?= $a ?></td>
                            <td><?= $line['nameuser'] ?></td>
                            <td> 
                                <div class="btn-group">

                                    <a href="?s=user&edit=<?= $line['iduser']-1 ?>">
                                      <button type="button" class="btn btn-warning"><i class="fa fa-fw fa-wrench"></i></button>
                                    </a>

                                </div>
                          </td>
                          </tr>
                          <?php
                              }
                            ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th rowspan="1" colspan="1">#</th>
                            <th rowspan="1" colspan="1">Nazwa</th>
                            <th rowspan="1" colspan="1">Edycja</th>

                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="box">
                <div class="box-header with-border">
              <h3 class="box-title">Dodawanie</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Login</label>

                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Login" name="login">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Hasło</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Hasło" name="pass">
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Zapisz</button>
              </div>
            </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

  
