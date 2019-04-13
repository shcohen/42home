// TOGGLE THE CAMERA
function hasGetUserMedia() {
    return !!(navigator.mediaDevices &&
        navigator.mediaDevices.getUserMedia);
}
    function startWebcam() {
        if (hasGetUserMedia()) {
            const hdConstraints = {
                video: {width: 590, height: 400}
            };
            const video = document.querySelector('#video');
            navigator.mediaDevices.getUserMedia(hdConstraints)
                .then((stream) => {video.srcObject = stream});
        } else {
            alert('getUserMedia() is not supported by your browser');
        }
    }

// TAKE THE PICURE
function screenShot(){
    const video = document.querySelector('#video');
    const img = document.querySelector('#img');
    const canvas = document.createElement('canvas');

    canvas.height = 450;
    canvas.width = 600;

    canvas.getContext('2d').drawImage(video, 0, 0);
    img.src = canvas.toDataURL('image/png');
}

// DISPLAY THE PICTURE
function    displayPicUp() {
    let video = document.getElementById('video');
    let img = document.getElementById('img');
    let screenshot = document.getElementById('screenshot');
    let retake = document.getElementById('retake');
    if (img.classList.contains('none')) {
        video.classList.remove('visi');
        video.classList.add('none');
        img.classList.remove('none');
        img.classList.add('visi');
        screenshot.classList.remove('activated');
        retake.classList.add('activated');
    }
}
    function    displayPicDown() {
        let video = document.getElementById('video');
        let img = document.getElementById('img');
        let retake = document.getElementById('retake');
        let screenshot = document.getElementById('screenshot');
        if (video.classList.contains('none')) {
            img.classList.remove('visi');
            img.classList.add('none');
            video.classList.remove('none');
            video.classList.add('visi');
            retake.classList.remove('activated');
            screenshot.classList.add('activated');
        }
    }

// SHOW OLD PICTURES
// function showOldPic() {
//     let old = document.getElementById('old');
//     if (old.classList.contains('none')) {
//         old.classList.remove('none');
//         old.classList.add('visi');
//     }
// }


// DISPLAY STICKERS
function sticky() {
    let stickers = document.getElementById('stickers');
    let up = document.getElementById('up');
    let down = document.getElementById('down');
    let left = document.getElementById('left');
    // let right = document.getElementById('right');
    if (stickers.classList.contains('none')) {
        stickers.classList.remove('none');
        up.classList.remove('none');
        down.classList.remove('none');
        left.classList.remove('none');
        // right.classList.remove('none');
    }
}

function cancelSticky() {
    let stickers = document.getElementById('stickers');
    let up = document.getElementById('up');
    let down = document.getElementById('down');
    let left = document.getElementById('left');
    // let right = document.getElementById('right');
    if (!stickers.classList.contains('none')) {
        stickers.classList.add('none');
        up.classList.add('none');
        down.classList.add('none');
        left.classList.add('none');
        // right.classList.add('none');
    }
}


// UPLOAD IMAGE FROM YOUR COMPUTER
// function uploadImage() {
//     const video = document.querySelector('#video');
//     const upload = document.querySelector('upload');
//     const canvas = document.createElement('canvas');
//     video.classList.remove('visi');
//     video.classList.add('none');
//     canvas.height = 442;
//     canvas.width = 600;
// }
    function    displayUp(event) {
    console.log(event.target.files);
        let webcam = document.getElementById('webcam');
        let upload = document.getElementById('upload');
        let upload_button = document.getElementById('upload_button');
        let webcam_button = document.getElementById('webcam_button');
        if (upload.classList.contains('none')) {
            webcam.classList.remove('visi');
            webcam.classList.add('none');
            upload.classList.remove('none');
            upload.classList.add('visi');
            webcam_button.classList.remove('activated');
            upload_button.classList.add('activated');
        }
    }
    function    displayWeb() {
        let img = document.getElementById('img');
        let video = document.getElementById('video');
        let webcam = document.getElementById('webcam');
        let upload = document.getElementById('upload');
        let upload_button = document.getElementById('upload_button');
        let webcam_button = document.getElementById('webcam_button');
        if (webcam.classList.contains('none')) {
            upload.classList.remove('visi');
            upload.classList.add('none');
            webcam.classList.remove('none');
            webcam.classList.add('visi');
            if (img.src.length < 50) {
                video.classList.remove('none');
                video.classList.add('visi');
            }
            upload_button.classList.remove('activated');
            webcam_button.classList.add('activated');
        } else if (img.classList.contains('visi')) {
            upload.classList.remove('visi');
            upload.classList.add('none');
            webcam.classList.remove('none');
            webcam.classList.add('visi');
            video.classList.remove('visi');
            video.classList.add('none');
        }
    }