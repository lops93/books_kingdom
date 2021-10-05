$(document).ready(function () {
  $("#btn-save").click(function () {
    var titulo = $("#titulo").val();
    var autor = $("#autor").val();
    var avaliacao = $("#avaliacao").val();
    var qtde_votos = $("#qtde_votos").val();
    var preco = $("#preco").val();
    var genero = $("#genero").val();
    var editora = $("#editora").val();
    var nmro_de_paginas = $("#nmro_de_paginas").val();
    var idioma = $("#idioma").val();
    var descricao = $("#descricao").val();
    var dt_publi = $("#dt_publi").val();

    if (titulo === "") {
      $.alert({
        title: "Campo Vazio!",
        content: "Digite o titulo do livro corretamente!",
        type: "red",
        typeAnimated: true,
      });
    } else if (autor === "") {
      $.alert({
        title: "Campo Vazio!",
        content: "Digite o nome do autor!",
        type: "red",
        typeAnimated: true,
      });
    } else if (dt_publi === "") {
      $.alert({
        title: "Campo Vazio!",
        content: "Digite a data da publicação!",
        type: "red",
        typeAnimated: true,
      });
    } else {
      $.post(
        "../../src/controller/add_livro.php?&titulo=" +
          titulo +
          "&autor=" +
          autor +
          "&avaliacao=" +
          avaliacao +
          "&qtde_votos=" +
          qtde_votos +
          "&preco=" +
          preco +
          "&genero=" +
          genero +
          "&editora=" +
          editora +
          "&nmro_de_paginas=" +
          nmro_de_paginas +
          "&idioma=" +
          idioma +
          "&descricao=" +
          descricao +
          "&dt_publi=" +
          dt_publi,
        function (data, status) {
          $.alert({
            title: "Inclusão de Registros",
            content: data,
            type: "green",
            typeAnimated: true,
            buttons: {
              ok: function () {
                $(location).attr("href", "cad_livro.php");
              },
            },
          });
        }
      );
    }
  });
});
