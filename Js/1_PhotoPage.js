/**
 * Created by Gladwin on 2017/05/09.
 */

(function () {
    var video = document.getElementById('video'),
        canvus = document.getElementById('canvus'),
        context = canvus.getContext('2d'),
        Photo = document.getElementById('Photo'),
        vendorUrl = window.URL || window.webkitURL;

    navigator.getMedia =    navigator.getUserMedia ||
                            navigator.webkitGetUserMedia ||
                            navigator.mozGetUserMedia ||
                            navigator.msGetUserMedia;


    navigator.getMedia({
        video: true,
        audio: false
    }, function (stream) {
        video.src = vendorUrl.createObjectURL(stream);
        video.play();
    }, function (error) {
        //error occured
        //error.code
    });


    document.getElementById('snap_button').addEventListener('click', function () {
        context.drawImage(video, 0, 0, 400, 300);
        Photo.setAttribute('src', canvus.toDataURL('image/png'));
    });


})();