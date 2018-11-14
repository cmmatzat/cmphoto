window.onload = function() {
    var header = document.querySelector("header.hdr-home");
    var bg_src = header.dataset.img;

    var temp_img = new Image();
    temp_img.onload = function() {
        console.log("Header Image Loaded");
        header.style.backgroundImage = 'url("' + bg_src + '")';
    }

    temp_img.src = bg_src;
}