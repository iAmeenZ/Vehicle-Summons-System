function userTab() {
  var userTab = document.getElementById("userDiv");
  var adminTab = document.getElementById("adminDiv");
  userTab.style.display = "block";
  adminTab.style.display = "none";

  var userBtn = document.getElementById("userBtn");
  var adminBtn = document.getElementById("adminBtn");
  adminBtn.style.backgroundColor = "transparent";
  adminBtn.style.color = "rgba(0,0,0,0.7)";
  userBtn.style.backgroundColor = "rgb(250,80,80)";
  userBtn.style.color = "rgba(255,255,255,0.9)";
  var submitBtn = document.getElementById("submitBtn");
  submitBtn.style.backgroundColor = "rgb(255,100,100)";
  var headerColor = document.getElementById("headerColor");
  headerColor.style.backgroundColor = "rgb(250,100,100)";
  var borderColor = document.getElementById("borderColor");
  borderColor.style.border = "2px solid rgb(250, 100, 100)";
}
function adminTab() {
  var userTab = document.getElementById("userDiv");
  var adminTab = document.getElementById("adminDiv");
  userTab.style.display = "none";
  adminTab.style.display = "block";

  var userBtn = document.getElementById("userBtn");
  var adminBtn = document.getElementById("adminBtn");
  userBtn.style.backgroundColor = "transparent";
  userBtn.style.color = "rgba(0,0,0,0.7)";
  adminBtn.style.backgroundColor = "rgb(80, 150, 255)";
  adminBtn.style.color = "rgba(255,255,255,0.9)";
  var submitBtn = document.getElementById("submitBtn");
  submitBtn.style.backgroundColor = "rgb(80, 150, 255)";
  var headerColor = document.getElementById("headerColor");
  headerColor.style.backgroundColor = "rgb(80, 150, 255)";
  var borderColor = document.getElementById("borderColor");
  borderColor.style.border = "2px solid rgb(80, 150, 255)";
}