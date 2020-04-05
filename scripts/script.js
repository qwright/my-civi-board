//Dummy redirect for now, can be expanded in needed
function redirect(form) {
	let cityInput = form.city.value;
	console.log(cityInput);
	window.location = "civiboard.html";
}

function filterTable() {
	var input, filter, table, tr, tdName, tdUsername, tdEmail, i, txtValue;
	input = document.getElementById("filtertable");
	filter = input.value.toUpperCase();
	table = document.getElementById("userInfoTable");
	tr = table.getElementsByTagName("tr");

	// Loop through all table rows, and hide those who don't match the search query
	for (i = 0; i < tr.length; i++) {
		tdName = tr[i].getElementsByTagName("td")[1];
		console.log(tdName);
		tdEmail = tr[i].getElementsByTagName("td")[2];
		tdUsername = tr[i].getElementsByTagName("td")[3];
		if (tdName || tdEmail || tdUsername) {
			txtValueName = tdName.textContent || tdName.innerText;
			txtValueEmail = tdEmail.textContent || tdEmail.innerText;
			txtValueUser = tdUsername.textContent || tdUsername.innerText;
			if (txtValueName.toUpperCase().indexOf(filter) > -1 || txtValueEmail.toUpperCase().indexOf(filter) > -1 || txtValueUser.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}
	}
}

window.onload = function () {
	if (window.location.href.match("civiboard.php") != null) {
		document.getElementById("post-btn").addEventListener("click", function () {
			var form = document.getElementById("post-form");
			if (form.className === "post-hid") {
				form.className = "post-vis";
			} else {
				form.className = "post-hid";
			}
		});
	}

	if (window.location.href.match("thread.php") != null) {
		document.getElementById("reply-btn").addEventListener("click", function () {
			console.log("reached");
			var form = document.getElementById("reply-form");
			if (form.className === "post-hid") {
				form.className = "post-vis";
			} else {
				form.className = "post-hid";
			}
		});
	}
};
