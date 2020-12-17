<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<style>
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color:red;
  font-family: "Courier New", Courier, monospace;
  font-size: 25px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

hr {
  margin: auto;
  width: 40%;
}
.middle{
  position: absolute;
  bottom: 0;
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1;
  width:80%;
  height:70%;
  margin-left:5%;
  margin-bottom:10%;
}
</style>
<body>

<div class="bgimg" style="background-image: url('<?=URL?>../assets/img/c.webp');">
  
  <div class="topleft">
    <p><img src="<?=URL?>../assets/img/newlogo.png"style="width:20%;margin-bottom:2%;margin-left:10%"></p>
  </div>
  <div class="middle" >
    <h1>We’ll be back soon!</h1>
    <hr>
    <h4>Sorry for the inconvenience but we’re performing some maintenance at the moment. If you need to you can always contact us, otherwise we’ll be back online shortly!</h4>
    <hr>
	<h4>The UbiAttendance Team</h4>
  </div>
 
</div>

</body>
</html>
