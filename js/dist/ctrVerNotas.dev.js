"use strict";

$(document).ready(function () {
  var periodo = $("#periodo").val();
  $.ajax({
    type: "POST",
    url: "../controller/ctrNota.php",
    data: {
      periodo: periodo
    },
    success: function success(response) {
      //$("#response").html(response);
      var tablaNotas = "";
      var json = JSON.parse(response);
      json.forEach(function (element) {
        console.log(element["Materia"]);
        tablaNotas = tablaNotas + "<tr>\n                    <td>".concat(element["Materia"], "</td>\n                    <td>").concat(element["Nota1"], "</td>\n                    <td>").concat(element["Nota2"], "</td>\n                    <td>").concat(element["Nota3"], "</td>\n                    <td>").concat(element["Nota4"], "</td>\n                    <td>").concat(element["Nota5"], "</td>\n                    <td>").concat(element["Definitiva"], "</td>\n                </tr>");
      });
      $("#notas").html(tablaNotas);
    }
  });
  $('#periodo').on('change', function () {
    periodo = $("#periodo").val();
    $.ajax({
      type: "POST",
      url: "../controller/ctrNota.php",
      data: {
        periodo: periodo
      },
      success: function success(response) {
        //$("#response").html(response);
        var tablaNotas = "";
        var json = JSON.parse(response);
        json.forEach(function (element) {
          console.log(element["Materia"]);
          tablaNotas = tablaNotas + "<tr>\n                    <td>".concat(element["Materia"], "</td>\n                    <td>").concat(element["Nota1"], "</td>\n                    <td>").concat(element["Nota2"], "</td>\n                    <td>").concat(element["Nota3"], "</td>\n                    <td>").concat(element["Nota4"], "</td>\n                    <td>").concat(element["Nota5"], "</td>\n                    <td>").concat(element["Definitiva"], "</td>\n                </tr>");
        });
        $("#notas").html(tablaNotas);
      }
    });
  });
});