
<html>

<head><title>Watch video</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


  <style>
.form-horizontal{
  background-image: linear-gradient(to right, white, #28239F);

}

.col-form-label
{
  font-size: 17px;
  font-weight: bold;
}

  </style>
</head>

<body>

<div class="zero">
    <h2>Upload Blog</h2>

  <!--  <a href="addPostTwo.php">View All Posts</a> -->


 <div class="container">

<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
  <fieldset>
    <h1>Add Post</h1>
    <br>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="title" class="col-lg-2 col-form-label">Title</label>
          <div class="col-lg-10">
            <input type="text" name="title" class="form-control" placeholder="Title">
          </div>
        </div>
      </div>
    </div>

    <br>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="about" class="col-lg-2 col-form-label">About</label>
          <div class="col-lg-10">
            <textarea class="form-control" rows="5" cols="10" name="about" placeholder="About"></textarea>
            <br>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="description" class="col-lg-2 col-form-label">Description</label>
          <div class="col-lg-10">
            <textarea class="form-control" rows="5" cols="10" name="description" placeholder="Description"></textarea>
            <br>
          </div>
        </div>
      </div>
    </div>
<br>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="featuredimage" class="col-lg-2 col-form-label">Featured Image</label>
          <div class="col-lg-10">
            <input type="file" name="feat_image" class="form-control" placeholder="feat_image">
            <br>
          </div>
        </div>
      </div>
    </div>
<br>

<form>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="category" class="col-lg-2 col-form-label">Category</label>
              <div class="col-lg-10">
    <select class="form-control" name="mycategory">
      <option value="ClassSixScience">ClassSixScience</option>
      <option value="ClassSevenScience">ClassSevenScience</option>
      <option value="ClassEightScience">ClassEightScience</option>
      <option value="ClassNineGM">ClassNineGM</option>
      <option value="ClassNineHM">ClassNineHM</option>
      <option value="ClassNinePhysics">ClassNinePhysics</option>
      <option value="ClassNineChemistry">ClassNineChemistry</option>
      <option value="ClassNineBiology">ClassNineBiology</option>

    </select>

              </div>
            </div>
          </div>
        </div>
    </form>
<br>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <div class="col-lg-10">
            <input type="submit" name="Submit" value="Add Post" class="btn btn-primary">
            <button type="reset" class="btn btn-default">Cancel</button>
          </div>
        </div>
      </div>
    </div>
<br>



</form>

<?php
include 'connection.php';

if(isset($_POST["Submit"]) && !empty($_FILES["feat_image"]["name"])){

  $statusMsg = '';

  $targetDir = "uploads/";
  $fileName = basename($_FILES["feat_image"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

  $title = $_POST['title'];
  $about = $_POST['about'];
  $description = $_POST['description'];
  $mycat= $_POST['mycategory'];


    // Allow certain file formats
    $allowTypes = array('jpeg','jpg','png','JPG','JPEG','PNG');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["feat_image"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into blogpost (title,about,description,feat_image,section) VALUES ('$title','$about', '$description','".$fileName."','$mycat')");

            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only jpeg,jpg,png files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;

 ?>

</div>


</body>
 </html>
