$(document).ready(function () {
  $("#tabla").DataTable();

  $("#tabla tr td").css("background-color", "#202c33");
  $("#tabla tr td").css("border", "1px solid white");
  $("#tabla tr").css("border", "1px solid white");
  $(".dataTables_length").css("color", "white");
  $("#tabla_filter").css("color", "white");
  $("#tabla_previous").css("color", "white");
  $("#tabla_info").css("color", "white");
});

$("#gift").click(function (e) {
  e.preventDefault();
  $(location).prop("href", "img.php");
});

$("#rangevalue").mouseover(function (e) {
  e.preventDefault();
});

$("#mensaje").submit(function (e) {
  e.preventDefault();
  $.ajax({
    url: "ajax/save_mensaje.php",
    data: $(this).serialize(),
    type: "POST",
    dataType: "text",
    success: function (text) {
      if (text == 1) {
        alert("Mensaje guardado, te amito!");
        $(location).prop("href", "index.php");
      } else {
        alert("No se guardo, pero igual te amo.");
        console.log(text);
      }
    },
    error: function (xhr, status, errorThrown) {
      alert("Error");
    },
  });
});
