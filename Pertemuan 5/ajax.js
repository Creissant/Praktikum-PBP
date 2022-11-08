// Nama: Fahrel Gibran Alghany'
// NIM: 24060120130106

function getXMLHTTPRequest() {
	if (window.getXMLHTTPRequest) {
		//code for modern browsers
		return new XMLHttpRequest();
	} else {
		//code for old IE browsers
		return new ActiveXObject('Microsoft.XMLHTTP');
	}
}

function get_server_time() {
	var xmlhttp = getXMLHTTPRequest();
	var page = 'get_server_time.php';
	xmlhttp.open('GET', page, true);
	xmlhttp.onreadystatechange = function() {
		document.getElementById('showtime').innerHTML =
			'<img src = "ajax_loader.png" width="1%">';
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('showtime').innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.send(null);
}

function add_customer_get() {
	var xmlhttp = getXMLHTTPRequest();
	var name = encodeURI(document.getElementById('name').value);
	var address = encodeURI(document.getElementById('address').value);
	var city = encodeURI(document.getElementById('city').value);
	if (name != '' && address != '' && city != '') {
		var url =
			'add_customer_get.php?name=' +
			name +
			'&address=' +
			address +
			'&city=' +
			city;
		var inner = 'add_response';

		xmlhttp.open('GET', url, true);
		xmlhttp.onreadystatechange = function() {
			document.getElementById(inner).innerHTML =
				'<img src = "ajax_loader.png" width="1%">';
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById(inner).innerHTML = xmlhttp.responseText;
			}
			return false;
		};
		xmlhttp.send(null);
	} else {
		alert('Please fill all the fields');
	}
}

function add_customer_post() {
	var xmlhttp = getXMLHTTPRequest();
	var name = encodeURI(document.getElementById('name').value);
	var address = encodeURI(document.getElementById('address').value);
	var city = encodeURI(document.getElementById('city').value);
	if (name != '' && address != '' && city != '') {
		//set url and inner
		var url = 'add_customer_post.php';
		var inner = 'add_response';
		//set parameter and open request
		var params = 'name=' + name + '&address=' + address + '&city=' + city;

		xmlhttp.open('POST', url, true);
		xmlhttp.setRequestHeader(
			'Content-type',
			'application/x-www-form-urlencoded'
		);
		xmlhttp.onreadystatechange = function() {
			document.getElementById(inner).innerHTML =
				'<img src = "ajax_loader.png" width="1%">';
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById(inner).innerHTML = xmlhttp.responseText;
			}
			return false;
		};
		xmlhttp.send(params);
	} else {
		alert('Please fill all the fields');
	}
}

// delete customer
function delete_customer() {
	var xmlhttp = getXMLHTTPRequest();
	if (customerid == '') {
		//set url and inner
		var url = 'delete_2.php?id=' + customerid;
		var inner = 'add_response';
		//set parameter and open request

		xmlhttp.open('POST', url, true);
		xmlhttp.setRequestHeader(
			'Content-type',
			'application/x-www-form-urlencoded'
		);
		xmlhttp.onreadystatechange = function() {
			document.getElementById(inner).innerHTML =
				'<img src = "ajax_loader.png" width="1%">';
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById(inner).innerHTML = xmlhttp.responseText;
			}
			return false;
		};
		xmlhttp.send(null);
	} else {
		alert('Sorry, the customer id is not found');
	}
}

function CallAjax(url, inner) {
	var xmlhttp = getXMLHTTPRequest();
	xmlhttp.open('GET', url, true);
	xmlhttp.onreadystatechange = function() {
		document.getElementById(inner).innerHTML =
			'<img src = "ajax_loader.png" width="1%">';
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById(inner).innerHTML = xmlhttp.responseText;
		}
		return false;
	};
	xmlhttp.send(null);
}

function showCustomer(customerid) {
	var inner = 'detail_customer';
	var url = 'get_customer.php?id=' + customerid;
	if (customerid == '') {
		document.getElementById(inner).innerHTML = '';
	} else {
		CallAjax(url, inner);
	}
}

function search_book() {
	let search = document.getElementById('search').value;
	let inner = 'result';
	let url = 'get_book.php?search=' + search;
	CallAjax(url, inner);
}

function detail_book(isbn) {
	let inner = 'result';
	let url = 'get_detail_book.php?isbn=' + isbn;
	CallAjax(url, inner);
}
