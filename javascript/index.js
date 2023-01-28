window.onload = function() {
    let createpost = document.getElementById("createpost");
    let postbox = document.getElementById("postblock");
    let closepostblock = document.getElementById("closepostblock");
    let image_file = document.getElementById("image_file");
    let image_preview = document.getElementById("file-preview-wrapper");
    let image_src = document.getElementById("image-preview");
    createpost.onclick = function() {
        createpost.style.display = "none";
        postbox.style.display = "block";
    };
  
    closepostblock.onclick = function() {
        postbox.style.display = "none";
        createpost.style.display = "flex";
    };

    image_file.onchange = function () {
        const file_tmp = image_file.files[0];
        console.log(file_tmp);
        image_preview.style.display = "block";
    }
  };  
