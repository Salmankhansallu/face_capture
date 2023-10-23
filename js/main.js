
function StartCapture(){
    var placeholder_img=document.getElementById('placeholder');
    var camera_feed=document.getElementById('camera-feed');
    var recapture_button=document.getElementById('recapture-button');
    var savecapture_button=document.getElementById('savecapture-button');
    const captureButton = document.getElementById("capture-button");
    const proceed_btn = document.getElementById("proceed_btn");
    const video = document.getElementById("video");
    const canvas = document.getElementById("canvas");
    placeholder_img.style.display="none";
    camera_feed.classList.remove('d-none');
    camera_feed.classList.add('d-flex');
    recapture_button.classList.remove('d-none');
    savecapture_button.classList.remove('d-none');
    savecapture_button.classList.add('d-flex');
    captureButton.classList.add('d-none');
    
    // Access the user's camera
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            video.srcObject = stream;
        })
        .catch(function(err) {
            alert("Error: Camera is not enabled..!")
            console.error("Error accessing camera:", err);
        });
    
    // Capture an image from the camera feed
    savecapture_button.addEventListener("click", function() {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        canvas.style.display = "block";
        video.style.display = "none";
        proceed_btn.classList.remove('d-none');
        proceed_btn.classList.add('d-flex');
        recapture_button.disabled=false;
        savecapture_button.disabled=true;
        const stream = video.srcObject;
        if (stream) {
            const tracks = stream.getTracks();
            tracks.forEach(track => track.stop());
        }


        
    });
    // recapture image
    recapture_button.addEventListener("click", function() {
        video.style.display = "block";
        canvas.style.display = "none";
        proceed_btn.classList.remove('d-flex');
        proceed_btn.classList.add('d-none');
        savecapture_button.disabled=false;
        StartCapture();

    });
    
    // Save the captured image to the server
    proceed_btn.addEventListener("click", function() {
        const imageDataURL = canvas.toDataURL('image/jpeg');
        $.ajax({
            type: "POST",
            url: "saveimage.php",
            data: {
                selfie : imageDataURL
            },
            success: function(response){
                var jsonResponse = JSON.parse(response);
                console.log(jsonResponse.status);
            }
        });
    });

}