<html>

<head><title>Watch video</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
  .col-lg-2 img{
    width:150px;
    height: 150px;
  }

  .row{
    margin-top: 20px;
margin-left: 50px;
  }
  </style>

</head>

<body>

<?php
include 'connection.php';
$posts_query="select * from blogpost";
$posts_result= mysqli_query($conn, $posts_query) or die("error");
if(mysqli_num_rows($posts_result)>0)
{
  while($posts = mysqli_fetch_assoc($posts_result)) {
    $id=$posts['id'];
    $title=$posts['title'];
    $description=$posts['description'];
    $feat_image=$posts['feat_image'];
    ?>

    <div class="row">
      <div class="col-lg-2">
      <?php echo "<img src='uploads/".$posts['feat_image']."' />"; ?>
      </div>

      <div class="col-lg-10">
        <h3><a href=""><?php echo "$title";?></a></h3>
        <p><?php echo nl2br($posts["description"]); ?></p>
        <div class="row">
        <div class="col-lg-1"><a href=viewBlog.php?id=<?php echo $id;?>>View</a></div>
        <div class="col-lg-1"><a href=edit.php?id=<?php echo $id;?>>Edit</a></div>
        <div class="col-lg-1"><a href=delete.php?id=<?php echo $id;?>>Delete</a></div>

      </div>
      </div>
    </div>
    <?php
  }
}

 ?>
</body>
