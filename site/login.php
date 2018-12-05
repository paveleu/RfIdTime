
<?php
if(isset($_SESSION['errorlogin'])){
	?>
	<div id="loginerror">
	<?php
	echo($_SESSION['errorlogin'].'<br />');
	unset($_SESSION['errorlogin']);
	?>
	</div>
	<?php
	
}

?>



	
<body class="hold-transition login-page">	
<div class="login-box">
  <div class="login-logo">
    <b>MTCP</b>
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Zaloguj się:</p>

    <form action="index.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Login" name="login">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">

          </div>
        </div>

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>

  </div>

</div>	
	

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>