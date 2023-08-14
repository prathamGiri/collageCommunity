let wrap;
window.onload = function() {
    let createpost = document.getElementById("createpost");
    let postbox = document.getElementById("postblock");
    let closepostblock = document.getElementById("closepostblock");
    wrap = document.getElementById('file-preview-wrapper');
    // let image_file = document.getElementById("image_file");
    // let image_preview = document.getElementById("file-preview-wrapper");
    // let image_src = document.getElementById("image-preview");
    createpost.onclick = function() {
        createpost.style.display = "none";
        postbox.style.display = "block";
    };
  
    closepostblock.onclick = function() {
        postbox.style.display = "none";
        createpost.style.display = "flex";
    };

    // image_file.onchange = function () {
    //     showPreview(event, image_src, image_preview);
    //     // const file_tmp = image_file.files[0];
    //     // console.log(file_tmp);
    //     // image_preview.style.display = "block";
    // }
    // image_file.onchange = evt => {
    //     const [file] = image_file.files;
    //     if (file) {
    //         image_src.src = URL.createObjectURL(file);
    //         image_preview.style.display = "block";
    //     }
    // }
  };  
  function updatePreview(input, target) {
      let file = input.files[0];
      let reader = new FileReader();

      reader.readAsDataURL(file);
      reader.onload = function () {
          let img = document.getElementById(target);
          // can also use "this.result"
          img.src = reader.result;
      }
      wrap.style.display = 'block';
  }
