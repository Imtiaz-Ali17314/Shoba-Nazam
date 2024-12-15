function $(id) {
  return document.getElementById(id);
}

$("interface").addEventListener("click", function (e) {
  $("msgbox").style.display = "none";
});

document.addEventListener("click", function (a) {
  if (a.target.id == "true") {
    $("form").submit();
  }
  if (a.target.id == "false") {
    $("alert").style.display = "none";
  }
});

//<img src="../images/Capture.PNG"
$("save").onclick = function () {
  if ($("name").value == "") {
    $("name").focus();
    $("name").style.outlineColor = "red";
  } else if ($("fathername").value == "") {
    $("fathername").focus();
    $("fathername").style.outlineColor = "red";
  } else if ($("code").value == "") {
    $("code").focus();
    $("code").style.outlineColor = "red";
  } else if ($("class").value == "") {
    $("class").focus();
    $("class").style.outlineColor = "red";
  } else {
    $("alert").style.display = "block";
  }
};
