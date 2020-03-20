//Dummy redirect for now, can be expanded in needed
function redirect(form) {
  let cityInput = form.city.value;
  console.log(cityInput);
  window.location = "civiboard.html";
}

window.onload = function() {
  if (window.location.href.match("civiboard.php") != null) {
    document.getElementById("post-btn").addEventListener("click", function() {
      var form = document.getElementById("post-form");
      if (form.className === "post-hid") {
        form.className = "post-vis";
      } else {
        form.className = "post-hid";
      }
    });
  }

  if (window.location.href.match("thread.php") != null) {
    document.getElementById("reply-btn").addEventListener("click", function() {
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
