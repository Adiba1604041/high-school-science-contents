<?php
include 'connection.php';
include 'allFunctions.php';

 ?>
<!DOCTYPE html>
<html>
<head>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<style>
#header{
  width: 100%;
  height: 120px;
  background-image: linear-gradient(to right, #28239F, white);
  color: white;
  font-family: cursive;
  font-weight: bold;
}
.maindiv{
  width: 100%;
  height: 700px;
  display: block;
  display: inline-block;
  position: relative;
  margin-left: auto;
  margin-right: auto;
  position: absolute;
  background-image: url(../Images/homepicone.jpg);
  background-size: 100% 100%;
  animation: slider 20s infinite linear;
}

@keyframes slider{
  0%{    background-image: url(../Images/homepicone.jpg);
}
  35%{    background-image: url(../Images/homepictwo.jpg);
}
}

input[type="submit"]
{
  width: 100%;
  margin-top: 50px;
  background-color: orange;
}

.modal-close{
  position: absolute;
  top:10px;
  right: 10px;
  margin: 0;
  padding: 0;
}
.mySlides {display:none;}

body {margin:0;}

.abc ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.abc li {
  float: right;
}

.abc li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.abc li a:hover:not(.active) {
  background-color: #111;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #28239F;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

input[type="submit"]
{
  width: 100%;
  margin-top: 50px;
  background-color: #28239F;
}

.modal-close{
  position: absolute;
  top:10px;
  right: 10px;
  margin: 0;
  padding: 0;
}

</style>
</head>
<body>
  <?php
  session_start();

  if(isset($_POST['LoginSubmit']))
  {

  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql="select * from register_table where username='$username' and password='$password'";
  $result=$conn->query($sql);
  if(mysqli_num_rows($result)>0)
  {
    if($row = $result->fetch_assoc())
    {
      $_SESSION['id']=$row['id'];

    }

    else
    {
      echo " <script>alert('not done')</script>";
      exit();
    }
  }
  }
  ?>

  <div class="abc">
  <ul>
    <?php
    if(isset($_SESSION['id']))
    {
      echo " <ul>
         <li> <a href='profile.php' class='btn btn-large teal modal-trigger'>Profile</a></li>
         <li>
         <form method='POST' action='".getLoggedout()."'>
         <button type='submit' class='btn btn-large teal modal-trigger' name='LogoutSubmit'>Logout</button>
         </form></li>
        </ul>";

    }
    else{
      echo"
      <ul>
      <li><a href='register.php' class='btn btn-large teal modal-trigger'>Sign up</a></li>
      <li><a href='#login' class='btn btn-large teal modal-trigger'>Login</a></li>
     </ul>";
  }
  ?>
</ul>
  </div>
  <div id ="header">
    <img src="../Images/scisix.jpg" alt="abc" width="220" height="120">
  </div>

<div class="xyz">
  <ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="thingswedo.php">Things we do</a></li>
    <li><a href="classes.php">Our classes</a></li>
    <li style="float:right"><a href="aboutus.php">About</a></li>
  </ul>
</div>

<div class="maindiv">
  <div class="modal" id="login">

    <h5 class="modal-close">&#10005;</h5>

       <div class="modal-content conter">

         <h4>Login Form</h4><br>

      <form method="POST" action="">

        <div class= "input-field">
          <i class= "material-icons prefix">person</i>
          <input type="text" name="username" id="username">
          <label for="username">User Name</label>
        </div><br>

        <div class= "input-field">
          <i class= "material-icons prefix">lock</i>
          <input type="password" name="password" id="pass">
          <label for="pass">Password</label>
        </div><br>

        <input type="submit" name="LoginSubmit" value="Login" class="btn btn-large">

      </form>

    </div>

  </div>

  <script>
  $(document).ready(function(){$('.modal').modal();});
  </script>


</div>


</body>
</html>
