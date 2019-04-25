// ------- MODAL ----------

window.onload = function() {
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.querySelectorAll(".myBtn");

  function openModal() {
    modal.style.display = "block";
  }

  for (i = 0; i < btn.length; i++) {
    btn[i].addEventListener("click", openModal);
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  };

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };

  // ------- AJAX REQUEST ----------

  document.getElementById("myBtn").addEventListener("click", loadDetails);

  // Load detailed data of a press release

  function loadDetails() {
    var xhr = new XMLHttpRequest();
    xhr.open(
      "GET",
      "https://www.ots.at/api/aussendung?app=6b572c35908e4a5c4f3b8a7ee3ea9c6d&schluessel=OTS_20190425_OTS0059&format=json",
      true
    );

    xhr.onload = function() {
      if (this.status == 200) {
        var details = JSON.parse(this.responseText);

        // console.log(details);

        var output = "";
        for (var i in details) {
          output +=
            '<div class = "detail">' +
            "<ul>" +
            "<li>TITEL: " +
            details[i].TITEL +
            "</li>" +
            "<li>UTL: " +
            details[i].UTL +
            "</li>" +
            "<li>INHALT: " +
            details[i].INHALT +
            "</li>" +
            "<li>RUECKFRAGEHINWEIS: " +
            details[i].RUECKFRAGEHINWEIS +
            "</li>" +
            "<li>EMITTENT : " +
            details[i].EMITTENT +
            "</li>" +
            "</ul>" +
            "</div>";
        }

        document.getElementById("modal-content-result").innerHTML = output;
      }
    };

    xhr.send();
  }
};
