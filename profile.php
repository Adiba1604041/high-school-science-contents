<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body{
		background: linear-gradient(90deg, #e8e8e8 50%, #28239F 50%);
	}
	.portfolio{
		padding:6%;
		text-align:center;
	}
	.heading{
		background: #fff;
		padding: 1%;
		text-align: left;
		box-shadow: 0px 0px 4px 0px #545b62;
	}
	.heading img{
		width: 10%;
	}
	.bio-info{
		padding: 5%;
		background:#fff;
		box-shadow: 0px 0px 4px 0px #b0b3b7;
	}
	.name{
		font-family: 'Charmonman', cursive;
		font-weight:600;
	}
	.bio-image{
		text-align:center;
	}
	.bio-image img{
		border-radius:50%;
	}
	.bio-content{
		text-align:left;
	}
	.bio-content p{
		font-weight:600;
		font-size:30px;
	}

</style>
</head>
<body onload="setup()">
<div class="container portfolio">
	<div class="row">
		<div class="col-md-12">
			<div class="heading">
				<img src="https://image.ibb.co/cbCMvA/logo.png" />
			</div>
		</div>
	</div>
	<div class="bio-info">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="bio-image">
							<?php
							include 'connection.php';
							session_start();
							$id=$_SESSION['id'];
							$sql2="select profilepic from register_table where id='$id'";
						  $result2= $conn->query($sql2);
						  if($row2=$result2->fetch_assoc()){
						  $image=$row2['profilepic'];
							echo "<img src='uploads/".$image."' / width=250px height=250px>";
						}
								?>
                  <form method="post">
								  <button name='DP'>Update DP</button></form>
						</div>
						<?php
						include 'allFunctions.php';
			      include 'connection.php';
						if(isset($_POST['DP']))
						{
							echo"<form action='' method='post' enctype='multipart/form-data'>
										<input type='file' name='file'>
										<input type='submit' name='submit' value='Upload'>
								</form>";
						}



					 $id=$_SESSION['id'];
					    // Include the database configuration file

					    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

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
					                // Insert image file name into database
													$insert = $conn->query("UPDATE register_table SET profilepic = '".$fileName."' WHERE id='$id';");
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




				 ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="bio-content">
					<h2><?php
					include 'connection.php';


					$id=$_SESSION['id'];
					$sql="select * from register_table where id='$id'";
					$result= $conn->query($sql);
					while($row=$result->fetch_assoc())
					{
						echo "<div class='commentbox'>";
				    echo "User name: ".$row ['username']."<br><br>";
				    echo "Email: ".$row['email']."<br><br>";
				    echo "Institution: ".$row['insname'];
				    echo "</div>";
					}
					?></h2>

				</div>
			</div>
		</div>
	</div>
  </div>
</body>

  </html>
