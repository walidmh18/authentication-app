let imageInp = document.getElementById("imageInp");
let chosenImage = document.getElementById("pfp");
// let fileName = document.getElementById("file-name");

['input', 'change'].forEach(e=>imageInp.addEventListener(e,() => {
    let reader = new FileReader();
    reader.readAsDataURL(imageInp.files[0]);
    reader.onload = () => {
        chosenImage.setAttribute("src",reader.result);
    }
   //  fileName.textContent = uploadButton.files[0].name;
}) )