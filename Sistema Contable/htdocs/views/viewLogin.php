<div style="margin-top:100px;" class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img style=" width:200px;" src="../assets/logo.png" id="icon" alt="User Icon" /> <br>
      <h4>INICIAR SESION</h4>
    </div>

    <!-- Login Form -->
    <form method="POST" action="../funciones/login.php">
      <input type="text" id="login" class="fadeIn second" name="Correo" placeholder="Correo">
      <input type="password" id="password" class="fadeIn third" name="Contraseña" placeholder="Contraseña">
      <input type="submit" class="fadeIn fourth" value="Ingresar">
    </form>
    <?php 
    
    if(isset($_SESSION["ERRORLOGIN"])){

    
    ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $_SESSION["ERRORLOGIN"];?>
  
</div>
    <?php } unset($_SESSION["ERRORLOGIN"]);?>
    

    <!-- Remind Passowrd -->
   

  </div>
</div>