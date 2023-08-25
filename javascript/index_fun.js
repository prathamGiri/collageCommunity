
window.onload = function() {
    console.log("123");
    let createpost = document.getElementById("createpost");
    let postbox = document.getElementById("postblock");
    let closepostblock = document.getElementById("closepostblock");
    wrap = document.getElementById('file-preview-wrapper');
    createpost.onclick = function() {
        createpost.style.display = "none";
        postbox.style.display = "block";
    };
  
    closepostblock.onclick = function() {
        postbox.style.display = "none";
        createpost.style.display = "flex";
    };
};  