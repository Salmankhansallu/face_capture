<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Image Capture and Save</title>
</head>
<body>

<!-- image capture html code here  start-->
   <div class="capture m-5 p-2" style="background-color: #fff;border-radius: 10px;box-shadow:-10px 0 10px -10px black,10px 0 10px -10px black,0 -10px 10px -10px black,0 10px 10px -10px black;">
        <div class="capture-image d-flex flex-column justify-content-center" style="border-radius:10px;">
            <div class="placeholder text-center mb-3" style="border-radius:10px;">
                <img id="placeholder" src="img/placeholder.png" alt="" style="border-radius: 10px;box-shadow:-10px 0 10px -10px black,10px 0 10px -10px black,0 -10px 10px -10px black,0 10px 10px -10px black;" width="40%" >
                <div id="camera-feed" class="d-none justify-content-center" style="background-size:cover;">
                    <video id="video" width="50%" height="50%" autoplay style="border-radius: 10px;box-shadow:-10px 0 10px -10px black,10px 0 10px -10px black,0 -10px 10px -10px black,0 10px 10px -10px black;"></video>
                    <canvas class="text-center" id="canvas" style="border:2px solid green;border-radius: 10px;box-shadow:-10px 0 10px -10px black,10px 0 10px -10px black,0 -10px 10px -10px black,0 10px 10px -10px black; display:none; width:50%;height:50%;"></canvas>
                </div>
                

            </div>
            <div class=" d-flex justify-content-center">
                
                <button id="capture-button" class="btn btn-primary"  onclick="StartCapture()">Get Started</button>
                <button id="savecapture-button" class="btn btn-primary mr-5 d-none">Image Capture</button>
                <button id="recapture-button" class="btn btn-warning d-none"  disabled>Recapture</button>
            </div>

        </div>
        <hr>
        <div id="proceed" class=" d-flex justify-content-end">
        
            <button id="proceed_btn" class="btn btn-primary d-none">Proceed</button>
        </div>
   </div>
    <!-- image capture html code here  end-->
    

    <script src="js/main.js"></script>
</body>
</html>
