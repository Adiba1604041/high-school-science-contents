<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}

#myVideo {
  background: cover;
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}

.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #28239F;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: #28239F;
}
</style>
</head>
<body>

<video autoplay muted loop id="myVideo">
  <source src="baby.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>

<div class="content">
  <h1>About us</h1>
  <p>This website is for the high school students who can easily get guideline to learn science (physics, chemistry, biology, mathematics) topics. The motivation behind this website is to help those students who can’t get into tuition due to financial crisis. Students from class 6 to 10 will get the articles and videos related to their text book syllabus to attain a clear concept. It will also help the users to share their own point of view on that respective topic in comment section. They can also ask question and get their answer in the comment section. . Each student will have this access by registering a user id in this website. Overall this website is going to be developed for the welfare of the high school students.</p>
  <button id="myBtn" onclick="myFunction()">Pause</button>
</div>

<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>

</body>
</html>
