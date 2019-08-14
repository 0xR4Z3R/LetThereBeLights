<?php
  session_start();
  if(!isset($_SESSION['username'])){
     header('location:login.php');
 }
?>

<html>
<head>
  <title> Home Page </title>

<!-- CSS -->

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">


<!-- JavaScript, JSON & AJAX -->

<script>

function buttonPressed(){

	document.getElementById("msg").style.color= "red";
	document.getElementById("msg").innerHTML = "<h3>you clicked Blink :)</h3>" 

}

function lightFade(lightId1,lightId2,lightId3)
{
    document.getElementById("msg").style.color= "red";
    document.getElementById("msg").innerHTML = "<h3>you clicked Blink :)</h3>"

    var lightOn = true;
    var bri = 255;
    var authCode = "lH7nZmlzj1fMbsjzOAyrs6sO24zAsMY--IiF59vH";
    
    var urlStr1 = "http://130.166.45.108/api/";
    urlStr1 += authCode;
    urlStr1 += "/lights/" + lightId1 + "/state";

    var urlStr2 = "http://130.166.45.108/api/";
    urlStr2 += authCode;
    urlStr2 += "/lights/" + lightId2 + "/state";

    var urlStr3 = "http://130.166.45.108/api/";
    urlStr3 += authCode;
    urlStr3 += "/lights/" + lightId3 + "/state";


   sendAJAX(urlStr1, "PUT", JSON.stringify( {"on":false, "bri":255} ) );
   sendAJAX(urlStr2, "PUT", JSON.stringify( {"on":false, "bri":255} ) );
   sendAJAX(urlStr3, "PUT", JSON.stringify( {"on":false, "bri":255} ) );


   for(var i=1; i<=12; i++)
   {
      if(bri<= 0) lightOn = false;
      sendAJAX(urlStr1, "PUT", JSON.stringify({ "hue": 65000 ,"bri": 255,"on": lightOn}));
      sleepMs(1000);
      sendAJAX(urlStr1, "PUT", JSON.stringify( {"on":false, "bri":0} ) );
      sendAJAX(urlStr2, "PUT", JSON.stringify({ "hue": 45000 ,"bri": 255,"on": lightOn}));
      sleepMs(1000);
      sendAJAX(urlStr2, "PUT", JSON.stringify( {"on":false, "bri":0} ) );
      sendAJAX(urlStr3, "PUT", JSON.stringify({ "hue": 5000 ,"bri": 255,"on": lightOn}));
      sleepMs(1000);
      sendAJAX(urlStr3, "PUT", JSON.stringify( {"on":false, "bri":0} ) );


   }
   
//    for(var i=1; i<=12; i++)
//   {
//      if(bri<= 0) lightOn = false;
//      sendAJAX(urlStr2, "PUT", JSON.stringify({ "hue": 35000 ,"bri": 255,"on": lightOn}));
//     sleepMs(2000);
//     sendAJAX(urlStr2, "PUT", JSON.stringify( {"on":false, "bri":0} ) );
//   }


//    for(var i=1; i<=12; i++)
//   {
//      if(bri<= 0) lightOn = false;
//      sendAJAX(urlStr3, "PUT", JSON.stringify({ "hue": 5000 ,"bri": 255,"on": lightOn}));
//      sleepMs(2000);
//      sendAJAX(urlStr3, "PUT", JSON.stringify( {"on":false, "bri":0} ) );

//   }


}


function sendAJAX(url,method,str)
{
   var req = new XMLHttpRequest();
   req.open(method, url, true);
   req.setRequestHeader("Content-Type","application/json");
   req.send(str);
}


function sleepMs(msec){
	
	var start = new Date().getTime();
	while((new Date().getTime()) < (start + msec));
	
}

function start(){
  var blinkBtn = document.getElementById("blink");
  blinkBtn.addEventListener("click", function(){lightFade(4,5,6);});

}

window.addEventListener("load",start,false);
</script>
</head>
<body>
<div class="container">
     <h1> Welcome <?php echo $_SESSION['username']; ?> </h1>
   <div class="blink-box">
          <div class="col-md-12">
             <h2> Try Philips hue bulbs</h2>
                <hr>
                <div class-"form-group">
                   <button id="blink" class="btn btn-primary"> Blink!! </button>
                </div>
                <hr>
                <div id="msg"><h4>msg</h4></div>

          </div>
   </div>
<hr>
<h4><a  href="logout.php">LOGOUT</a></h4>

</div>
</body>

</html>
