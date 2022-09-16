
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
{
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
  overflow-y: hidden;
}

#myVideo {
  position: absolute;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  filter: brightness(0.5);
}

.content {
  color: #f1f1f1;
  width: 50%;
  text-align: center;
  margin: 0 auto;
  margin-top: -40%;
  z-index: 1;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #474956;
  color: #fff;
  cursor: pointer;
}

.videobg {
    position: relative;
    width: 100%;
    height: 100%;
    background: #053a53;
    background-size: 100% auto;
    background-repeat: no-repeat;
    overflow: hidden;
;;z-index: -1;;;
}

video {
    width: 100%;
    height: auto;
    opacity: 0.10;
    filter: alpha(opacity=10);
    -webkit-filter: grayscale(1);
    filter: grayscale(1);
}


#myBtn:hover {
  background: #ddd;
  color: black;
}
</style>
</head>



    <body class="antialiased">
    



<div class="videobg">
<video poster="{{ asset('admin-assets/dist/img/accounting.jpg') }}" id="bgvid" playsinline="" autoplay="" muted="" loop="">
    <source src="{{ asset('admin-assets/dist/img/accounting.mp4') }}" type="video/mp4">
</video>
</div>

<div class="content">
  <h1>Accounting Pure Php</h1>
  <p>Accounting Proejct Pure Php Version</p>
 <a href="{{ route('login') }}" > <button id="myBtn" >View Project</button></a>
</div>



</body>
</html>