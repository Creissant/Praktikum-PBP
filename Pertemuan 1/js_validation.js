// Fahrel Gibran Alghany
// 24060120130106

// Captcha
// Create captcha consist of mixed uppercase and lowercase character
let captcha = '';
let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
for (let i = 0; i < 5; i++) { 
  captcha += characters.charAt(Math.floor(Math.random() * characters.length));
}

// Set the captcha
document.getElementById('captcha').placeholder = captcha;

// Set the pop-up message for captcha-answer
document.getElementById('captcha-answer').setCustomValidity("Captcha is not valid"); 

// Validate Captcha on Submit
const validateCaptcha = () => {
  const captchaInput = document.getElementById('captcha-answer').value;
  // If the input is not equal to the captcha, show invalid message
  if (captchaInput !== captcha) {
    document.getElementById('captcha-answer').setCustomValidity("Captcha is not valid");
  } else {
    document.getElementById('captcha-answer').setCustomValidity("");
  }
}

// Set the pop-up message for checkbox input, minimal selected is 3
const validateCheckbox = () => {
  const checkbox = document.getElementsByClassName('checkbox-kurir');
  let count = 0;
  for (let i = 0; i < checkbox.length; i++) {
    if (checkbox[i].checked) {
      count++;
    }
  }
  if (count < 3) {
    // Change all the custom validity
    for (let i = 0; i < checkbox.length; i++) {
      checkbox[i].setCustomValidity("You must select at least 3 courier");
    }
  } else {
    for (let i = 0; i < checkbox.length; i++) {
      checkbox[i].setCustomValidity("");
    }
  }
}

validateCheckbox();

// Sub-kategori
// Create subcategory for each category selected
const createSubcategory = () => {
  let category = document.getElementById('kategori').value;
  let subkategori = document.getElementById('sub-kategori');
  subkategori.innerHTML = '';
  if (category === 'baju') {
    subkategori.innerHTML += '<option value="" selected disabled >--Pilih Sub Kategori--</option>';
    subkategori.innerHTML += '<option value="2">Baju Pria</option>';
    subkategori.innerHTML += '<option value="3">Baju Wanita</option>';
    subkategori.innerHTML += '<option value="4">Baju Anak</option>';
  } else if (category === 'elektronik') {
    subkategori.innerHTML += '<option value="" selected disabled >--Pilih Sub Kategori--</option>';
    subkategori.innerHTML += '<option value="2">Mesin Cuci</option>';
    subkategori.innerHTML += '<option value="3">Kulkas</option>';
    subkategori.innerHTML += '<option value="4">AC</option>';
  } else if (category === 'alat-tulis') {
    subkategori.innerHTML += '<option value="" selected disabled >--Pilih Sub Kategori--</option>';
    subkategori.innerHTML += '<option value="2">Kertas</option>';
    subkategori.innerHTML += '<option value="3">Map</option>';
    subkategori.innerHTML += '<option value="4">Pulpen</option>';
  }
}

// If the radio with id grosir-y is checked, add required attribute to the input with id harga-grosir
const checkGrosir = () => {
  let grosirElement = document.getElementById('grosir-y');
  let hargaGrosir = document.getElementById('harga-grosir');
  if (grosirElement.checked) {
    hargaGrosir.setAttribute('required', 'required');
  } else {
    hargaGrosir.removeAttribute('required');
  }
}