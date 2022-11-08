// Fahrel Gibran Alghany
// 24060120130106

function getXMLHttpRequest() {
	if (window.XMLHttpRequest) {
		//code for modern browser
		return new XMLHttpRequest();
	} else {
		//code for old IE browser
		return new ActiveXObject('Microsoft.XMLHTTP');
	}
}

function getUser() {
	var email = encodeURI(document.forms['daftar']['email'].value);
	var inner = 'error_email';
	var url = 'get_user.php?email=' + email;

	// Get ajax request to url
	var ajax = getXMLHttpRequest();
	ajax.open('GET', url, true);
	ajax.send();
	// Set response
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			if (!ajax.responseText) {
				document.getElementById(inner).innerHTML =
					"<p style='color: green;'>Email tersedia</p>";
				document.getElementById('submit').disabled = false;
			} else {
				document.getElementById(inner).innerHTML =
					"<p style='color: red;'>Email sudah digunakan</p>";
				document.getElementById('submit').disabled = true;
			}
		}
	};
}

function getKabupaten() {
	// Get provinsi value
	var idProv = document.getElementById('provinsi').value;
	var inner = 'kabupaten';
	var url = 'get_kabupaten.php?id_provinsi=' + idProv;
	// Get ajax request to url
	var ajax = getXMLHttpRequest();
	ajax.open('GET', url, true);
	ajax.send();
	// Set response
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			document.getElementById(inner).innerHTML = ajax.responseText;
		}
	};
}

function getProvinsi() {
	var inner = 'provinsi';
	var url = 'get_provinsi.php';
	// Get ajax request to url
	var ajax = getXMLHttpRequest();
	ajax.open('GET', url, true);
	ajax.send();
	// Set response
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var response = ajax.responseText;
			document.getElementById(inner).innerHTML = response;
		}
	};
}
