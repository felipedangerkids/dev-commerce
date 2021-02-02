let imPhone = new Inputmask('99999-9999');
imPhone.mask(document.getElementById('telefone'));
let dd = new Inputmask('99');
dd.mask(document.getElementById('dd'));
let cep = new Inputmask('99999-999');
cep.mask(document.getElementById('cep'));
let card = new Inputmask('9999999999999999');
card.mask(document.getElementById('card'));



function myFunction(imgs) {
      // Get the expanded image
      var expandImg = document.getElementById("expandedImg");
      // Get the image text
      var imgText = document.getElementById("imgtext");
      // Use the same src in the expanded image as the image being clicked on from the grid
      expandImg.src = imgs.src;
      // Use the value of the alt attribute of the clickable image as text inside the expanded image
      imgText.innerHTML = imgs.alt;
      // Show the container element (hidden with CSS)
      expandImg.parentElement.style.display = "block";
}