<!DOCTYPE html>
<html>
<head>
<style>

.btn-group button {
  background-color: #fff; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
  font-weight: bold;
  float: none;
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: skyblue;
}
}
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
  grid-column-gap: 50px;
  grid-row-gap: 20px;
  grid-template-columns: auto auto auto;
  background-color: #fff;
  padding: 10px;
}

.grid-item {
  background-image: linear-gradient(to right, #28239F, white);
  width: 350px;
  height: 500px;
  background-color: rgba(255, 255, 255, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

</style>
</head>
<body>
  <?php

  include 'connection.php';
  include 'allFunctions.php';
  session_start();

  if(isset($_SESSION['id']))
  {
  if ($_SESSION['id']==1)
  {
  echo " <h3> <a href='adminProfiletwo.php'>Upload Article Post</a></h3><br>";
  echo " <h3> <a href='#'>Upload Tutorial Post</a></h3><br>";
  echo"<form action='' method='post' enctype='multipart/form-data'>
      <input type='file' name='file'>
      <select id='cls' name='secname'><option>ClassSixScience<option>ClassSevenScience<option>ClassEightScience<option>ClassNineGM<option>ClassNineHM<option>ClassNinePhysics<option>ClassNineChemistry<option>ClassNineBiology<option></select>
      <input type='submit' name='submit' value='Upload'>
  </form>";
  // Include the database configuration file

  if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

    $statusMsg = '';

    // File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

       $mySection=$_POST['secname'];

      // Allow certain file formats
      $allowTypes = array('mp3','mp4');
      if(in_array($fileType, $allowTypes)){
          // Upload file to server
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
              // Insert image file name into database
              $insert = $conn->query("INSERT into upload_table (filename, uploaded_on,section) VALUES ('".$fileName."', NOW(),'$mySection')");
              if($insert){
                  $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
              }else{
                  $statusMsg = "File upload failed, please try again.";
              }
          }else{
              $statusMsg = "Sorry, there was an error uploading your file.";
          }
      }else{
          $statusMsg = 'Sorry, only mp3,mp4 files are allowed to upload.';
      }
  }else{
      $statusMsg = 'Please select a file to upload.';
  }

  // Display status message
  echo $statusMsg;

  }

  else {
    echo"";
  }

  }

  ?>


<div class="grid-container">
  <div class="grid-item">
    <div class="card">
      <img src="../Images/sciclasssix.png" alt="Avatar" style="width:100%;height:300px;">
      <div class="container">
        <h4><b>Class Six Science</b></h4>
        <div class="btn-group">
          <button><a href="classSix.php"><p class="blog-meta">Go to classroom</p></a></button>
        </div>
      </div>
    </div>
  </div>
  <div class="grid-item">
    <div class="card">
      <img src="../Images/sciclassseven.png" alt="Avatar" style="width:100%;height:300px;">
      <div class="container">
        <h4><b>Class Seven Science</b></h4>
        <div class="btn-group">
          <button><a href="classSeven.php"><p class="blog-meta">Go to classroom</p></a></button>
        </div>
      </div>
    </div>
</div>
  <div class="grid-item">
    <div class="card">
      <img src="../Images/sciclasseight.png" alt="Avatar" style="width:100%;height:300px;">
      <div class="container">
        <h4><b>Class Eight Science</b></h4>
        <div class="btn-group">
          <button><a href="classEight.php"><p class="blog-meta">Go to classroom</p></a></button>

        </div>
      </div>
    </div>
  </div>
  <div class="grid-item">
    <div class="card">
      <img src="../Images/classninemath.jpg" alt="Avatar" style="width:100%;height:300px;">
      <div class="container">
        <h4><b>Class Nine General Math</b></h4>
        <div class="btn-group">
          <button><a href="classNineGM.php"><p class="blog-meta">Go to classroom</p></a></button>
        </div>
      </div>
    </div>
  </div>
  <div class="grid-item">
    <div class="card">
      <img src="../Images/sciclassninehm.png" alt="Avatar" style="width:100%;height:300px;">
      <div class="container">
        <h4><b>Class Nine Higher Math</b></h4>
        <div class="btn-group">
          <button><a href="classNineHM.php"><p class="blog-meta">Go to classroom</p></a></button>
        </div>
      </div>
    </div>
  </div>
  <div class="grid-item">
    <div class="card">
      <img src="../Images/sciclassninephy.png" alt="Avatar" style="width:100%;height:300px;">
      <div class="container">
        <h4><b>Class Nine Physics</b></h4>
        <div class="btn-group">
          <button><a href="classNinePhysics.php"><p class="blog-meta">Go to classroom</p></a></button>
        </div>
      </div>
    </div>
  </div>
  <div class="grid-item">
    <div class="card">
      <img src="../Images/sciclassninechem.png" alt="Avatar" style="width:100%;height:300px;">
      <div class="container">
        <h4><b>Class Nine Chemistry</b></h4>
        <div class="btn-group">
          <button><a href="classNineChem.php"><p class="blog-meta">Go to classroom</p></a></button>
        </div>
      </div>
    </div>
  </div>
  <div class="grid-item">
    <div class="card">
      <img src="../Images/sciclassninebio.jpg" alt="Avatar" style="width:100%;height:300px;">
      <div class="container">
        <h4><b>Class Nine Biology</b></h4>
        <div class="btn-group">
          <button><a href="classNineBiology.php"><p class="blog-meta">Go to classroom</p></a></button>
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>
