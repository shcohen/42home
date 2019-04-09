function hasGetUserMedia() {
    return !!(navigator.mediaDevices &&
        navigator.mediaDevices.getUserMedia);
}

if (hasGetUserMedia()) {
    const hdConstraints = {
        video: {width: {exact: 590}, height: {exact: 400}}
    };

    const video = document.querySelector('video');

    navigator.mediaDevices.getUserMedia(hdConstraints).
    then((stream) => {video.srcObject = stream});
} else {
    alert('getUserMedia() is not supported by your browser');
}