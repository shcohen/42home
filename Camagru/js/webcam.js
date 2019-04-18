// TOGGLE THE CAMERA
function hasGetUserMedia() {
    return !!(navigator.mediaDevices &&
        navigator.mediaDevices.getUserMedia);
}
function startWebcam() {
    if (hasGetUserMedia()) {
        const hdConstraints = {
            video: {width: 600, height: 450}
        };
        const video = document.querySelector('#video');
        navigator.mediaDevices.getUserMedia(hdConstraints)
            .then((stream) => {
                video.srcObject = stream
            });
    } else {
        alert('getUserMedia() is not supported by your browser');
    }
}

// TAKE PICURES
function screenShot() {
    const video = document.querySelector('#video');
    const img = document.querySelector('#img');
    const canvas = document.createElement('canvas');

    canvas.height = 450;
    canvas.width = 600;

    canvas.getContext('2d').drawImage(video, 0, 0);
    img.src = canvas.toDataURL('image/png');

    document.querySelector('#title').style.display = 'block';
    document.querySelector('#up').style.display = 'block';
}

// DISPLAY PICTURES
function displayPicUp() {
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

function displayPicDown() {
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
let i = 0;
function sticky(array) {
    array = decodeURIComponent(array);
    let sticky = JSON.parse(array);
    let stickers = document.getElementById('stickers');

    let up = document.getElementById('up');
    let down = document.getElementById('down');
    let left = document.getElementById('left');
    let right = document.getElementById('right');

    let up2 = document.getElementById('up2');
    let down2 = document.getElementById('down2');
    let left2 = document.getElementById('left2');
    let right2 = document.getElementById('right2');
    if (stickers.classList.contains('none')) {
        stickers.classList.remove('none');
        up.classList.remove('none');
        down.classList.remove('none');
        left.classList.remove('none');
        right.classList.remove('none');

        up2.classList.remove('none');
        down2.classList.remove('none');
        left2.classList.remove('none');
        right2.classList.remove('none');
    }
    let max = sticky.length;
    stickers.src = "/assets/stickers/" + sticky[i];
    if (i === (max - 1)) {
        i = 0;
    } else
        i = i + 1;
}

function cancelSticky() {
    let stickers = document.getElementById('stickers');
    let up = document.getElementById('up');
    let down = document.getElementById('down');
    let left = document.getElementById('left');
    let right = document.getElementById('right');

    let text = document.getElementById('title');
    let submit = document.getElementById('green');

    let up2 = document.getElementById('up2');
    let down2 = document.getElementById('down2');
    let left2 = document.getElementById('left2');
    let right2 = document.getElementById('right2');
    if (!stickers.classList.contains('none')) {
        stickers.classList.add('none');
        up.classList.add('none');
        down.classList.add('none');
        left.classList.add('none');
        right.classList.add('none');

        text.classList.add('none');
        submit.classList.add('none');

        up2.classList.add('none');
        down2.classList.add('none');
        left2.classList.add('none');
        right2.classList.add('none');
    }
}

// MOVING STICKERS
function moveUp() {
    let stickers = document.getElementById('stickers');
    if (parseInt(stickers.style.top) > 405) {
        stickers.style.top = parseInt(stickers.style.top) - 5 + 'px';
    }
}
function moveDown() {
    let stickers = document.getElementById('stickers');
    if (parseInt(stickers.style.top) < 645) {
        stickers.style.top = parseInt(stickers.style.top) + 5 + 'px';
    }
}
function moveLeft() {
    let stickers = document.getElementById('stickers');
    if (parseInt(stickers.style.left) > 780) {
        stickers.style.left = parseInt(stickers.style.left) - 5 + 'px';
    }
}
function moveRight() {
    let stickers = document.getElementById('stickers');
    if (parseInt(stickers.style.left) < 1170) {
        stickers.style.left = parseInt(stickers.style.left) + 5 + 'px';
    }
}

// UPLOAD IMAGE FROM YOUR COMPUTER
function uploadImage(event) {
    let imgObj = new Image();
    imgObj.src = window.URL.createObjectURL(event.target.files[0]);
    let file = document.getElementById('imgU');
    const canvas = document.createElement('canvas');

    canvas.height = 450;
    canvas.width = 600;

    imgObj.onload = () => {
        if (imgObj.height / imgObj.width >= canvas.height / canvas.width) {
            let heightObj = canvas.height * imgObj.width / canvas.width;
            canvas.getContext('2d').drawImage(imgObj,
                0, (imgObj.height - heightObj) / 2, imgObj.width, heightObj,
                0, 0,
                canvas.width, canvas.height);
        } else {
            let widthObj = canvas.width * imgObj.height / canvas.height;
            canvas.getContext('2d').drawImage(imgObj,
                (imgObj.width - widthObj) / 2, 0, widthObj, imgObj.height,
                0, 0,
                canvas.width, canvas.height);
        }
        file.src = canvas.toDataURL('image/png');
    }
}

// DISPLAY ACCURATE FRAMEWORK
function displayUp() {
    let webcam = document.getElementById('webcam');
    let upload = document.querySelector('div#upload');
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

function displayWeb() {
    let img = document.getElementById('img');
    let video = document.getElementById('video');
    let webcam = document.getElementById('webcam');
    let upload = document.querySelector('div#upload');
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
    } else if (img.classList.contains('none')) {
        upload.classList.remove('visi');
        upload.classList.add('none');
        webcam.classList.remove('none');
        webcam.classList.add('visi');
        // video.classList.remove('visi');
        // video.classList.add('none');
    }
}

function displayTitle() {
    let upload_button = document.getElementById('upload_button');
    let webcam_button = document.getElementById('webcam_button');

    if (webcam_button.classList.contains('activated') || upload_button.classList.contains('activated')) {
        let text = document.getElementById('title');
        let submit = document.getElementById('green');
        if (submit.classList.contains('none')){
            text.classList.remove('none');
            text.classList.add('visi');
            submit.classList.remove('none');
            submit.classList.add('visi');
        }
    }
    // ('#webcam_button').click(function() {
    //     $(this).data('clicked', true);
    //     if (('#webcam_button').data('clicked')) {
    //         let text = document.getElementById('title');
    //         let submit = document.getElementById('green');
    //         if (submit.classList.contains('none')) {
    //             text.classList.remove('none');
    //             text.classList.add('visi');
    //             submit.classList.remove('none');
    //             submit.classList.add('visi');
    //         }
    //     }
    // });
}