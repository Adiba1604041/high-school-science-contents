
<?php

  function setComments($conn)
{

  if(isset($_POST['CommentSubmit']))
  {
    $vid=$_SESSION['varname'];
    $uid=$_POST['uid'];
    $date=$_POST['date'];
    $message=$_POST['message'];

    $sql="insert into comment_table (uid,date,message,vid) values('$uid','$date','$message','$vid')";
    $result= $conn->query($sql);

  }

}

function setBlogComments($conn)
{

  if(isset($_POST['CommentSubmit']))
  {
    $bid=$_SESSION['varname'];
    $uid=$_POST['uid'];
    $date=$_POST['date'];
    $message=$_POST['message'];

    $sql="insert into blog_comments (uid,date,message,bid) values('$uid','$date','$message','$bid')";
    $result= $conn->query($sql);

  }

}

function getComments($conn)
{
    $vid=$_SESSION['varname'];
    $sql="select * from comment_table where vid='$vid'";
    $result= $conn->query($sql);
    while($row=$result->fetch_assoc())
{
  $id=$row['uid'];
  $sql2="select * from register_table where id='$id'";
  $result2= $conn->query($sql2);
  if($row2=$result2->fetch_assoc()){
    echo "<div class='commentbox'>";
    echo $row2 ['username']."<br>";
    echo $row['date']."<br>";
    echo $row['message'];
    echo "</div>";
  }

}

}

function getBlogComments($conn)
{
    $bid=$_SESSION['varname'];
    $sql="select * from blog_comments where bid='$bid'";
    $result= $conn->query($sql);
    while($row=$result->fetch_assoc())
{
  $id=$row['uid'];
  $sql2="select * from register_table where id='$id'";
  $result2= $conn->query($sql2);
  if($row2=$result2->fetch_assoc()){
    echo "<div class='commentbox'>";
    echo $row2 ['username']."<br>";
    echo $row['date']."<br>";
    echo $row['message'];
    echo "</div>";
  }

}

}

function getLoggedout()
{
  if(isset($_POST['LogoutSubmit']))
{
  session_start();
  session_destroy();
  header("Location: myhomepage.php");
  exit();

}
}

function insertDP()
{
  if(isset($_POST["Submit"]) && !empty($_FILES["file"]["name"])){

    $statusMsg = '';

    // File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

      // Allow certain file formats
      $allowTypes = array('jpg','jpeg','png','JPG','JPEG','PNG');
      if(in_array($fileType, $allowTypes)){
          // Upload file to server
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
              // Insert image file name into database4
              $insert = $conn->query("INSERT into pdffile (filename) VALUES ('".$fileName."')");
              if($insert){
                  $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
              }else{
                  $statusMsg = "File upload failed, please try again.";
              }
          }else{
              $statusMsg = "Sorry, there was an error uploading your file.";
          }
      }else{
          $statusMsg = 'Sorry, only jpg,png files are allowed to upload.';
      }
  }else{
      $statusMsg = 'Please select a file to upload.';
  }

  // Display status message
  echo $statusMsg;

}
