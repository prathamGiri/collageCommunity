
let createpost = document.getElementById('createpost');
createpost.onclick = function() {
    createpost.style.display="none";
    document.getElementById('postblock').style.display="block";
};

document.getElementById('closepostblock').onclick=()=>{
    document.getElementById('postblock').style.display="none";
    document.getElementById('createpost').style.display="block";
};