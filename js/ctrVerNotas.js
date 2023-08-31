$(document).ready(function(){

    var periodo=$("#periodo").val();
    $.ajax({
        type: "POST",
        url: "../controller/ctrNota.php",
        data: {periodo},
        success: function (response) {
                console.log(response)
                //$("#response").html(response);
                 var tablaNotas="";
                var json=JSON.parse(response);
                json.forEach(element => {
                    console.log(element["Materia"]);
                    tablaNotas=tablaNotas+ `<tr>
                    <td>${element["Materia"]}</td>
                    <td>${element["Nota1"]}</td>
                    <td>${element["Nota2"]}</td>
                    <td>${element["Nota3"]}</td>
                    <td>${element["Nota4"]}</td>
                    <td>${element["Nota5"]}</td>
                    <td>${element["Definitiva"]}</td>
                </tr>`
                });
                $("#notas").html(tablaNotas);
        }
    });
    $('#periodo').on('change', function() {
        periodo=$("#periodo").val();
        $.ajax({
            type: "POST",
            url: "../controller/ctrNota.php",
            data: {periodo},
            success: function (response) {
                //$("#response").html(response);
                var tablaNotas="";
                var json=JSON.parse(response);
                json.forEach(element => {
                    console.log(element["Materia"]);
                    tablaNotas=tablaNotas+ `<tr>
                    <td>${element["Materia"]}</td>
                    <td>${element["Nota1"]}</td>
                    <td>${element["Nota2"]}</td>
                    <td>${element["Nota3"]}</td>
                    <td>${element["Nota4"]}</td>
                    <td>${element["Nota5"]}</td>
                    <td>${element["Definitiva"]}</td>
                </tr>`
                });
                $("#notas").html(tablaNotas);
            }
        });
      });
})