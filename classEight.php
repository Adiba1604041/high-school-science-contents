<?php
include 'connection.php';
session_start();
  ?>

<html>
<head>
<title>
  Class Six
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
$(document).ready(function(){
    $("a href").click();
});
</script>

<link rel="stylesheet" href="css/classStyle.css" type="text/css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 90%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}

.grid-container {
  display: grid;
  grid-column-gap: 20px;
  grid-row-gap: 20px;
  grid-template-columns: auto auto auto;
  background-color: #fff;
  padding: 10px;
}

.grid-item {
  background-color: white;
  width: 300px;
  height: 350px;
  background-color: rgba(255, 255, 255, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}


.col-lg-2 img{
  width:190px;
  height: 150px;
  float: none;
}

.row{
  margin-top: 20px;
margin-left: 50px;
}

.header{
  background-image: url(../Images/sixscibg.jpg);
}

h1{
  font-size:50px;
  color: #28239F;
  font-weight: bold;

}
.abc a{
  font-size: 20px;
  color: red;
}
</style>
</head>

<body>


  <div class="w3-container w3-center w3-animate-zoom">
  <h1>Class Eight Science!</h1>
  <p>Welcome to the science world of class Eight</p>
</div>


  <div class="menu">
    <h2>Tutorials</h2><br>
    <?php
 $q= "Select * from upload_table where section='ClassEightScience'";
 $query= mysqli_query($conn,$q);
 while ($row=mysqli_fetch_assoc($query)) {
   $id=$row['id'];
   $filename= $row['filename'];
   echo "<a href='watch.php?id=$id'>$filename</a><br><br>";
   // code...
 }
?>
</div>

<div class="main">
  <h2>Articles</h2><br>

  <?php
  include 'connection.php';
  $posts_query="select * from blogpost where section='ClassEightScience'";
  $posts_result= mysqli_query($conn, $posts_query) or die("error");
  echo"<div class='grid-container'>";
  if(mysqli_num_rows($posts_result)>0)
  {
    while($posts = mysqli_fetch_assoc($posts_result)) {
      $id=$posts['blog_id'];
      $title=$posts['title'];
      $about=$posts['about'];
      $description=$posts['description'];
      $feat_image=$posts['feat_image'];
      ?>


        <div class="grid-item">
          <div class="card">
             <div class="col-lg-2">
            <?php echo "<img src='uploads/".$posts['feat_image']."'/>"; ?>
          </div>
            <div class="container">
              <h3><?php echo "$title";?></h3><br>
                <div class="abc"><a href=viewBlog.php?id=<?php echo $id;?>>View</a></div>
              </div>

          </div>
        </div>

      <?php

    }
  }
echo "</div>";
   ?>
  </div>


</body>
</html>
