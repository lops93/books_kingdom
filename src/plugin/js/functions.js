$(document).ready(function () {
  //adicionar um livro
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
  //deletar um livro
  $(".delete").click(function () {
    var id = $(this).attr("id");
    var titulo = $(this).attr("titulo");
    //variavel que pega o atributo(attr) da classe delete(this)
    $.confirm({
      title: " ",
      content: "Tem certeza que deseja excluir o livro " + titulo,
      type: "red",
      typeAnimated: true,
      buttons: {
        tryAgain: {
          text: "excluir",
          btnClass: "btn-red",
          action: function () {
            $.post(
              "../../src/controller/deleta_livro.php?&titulo=" + id,
              function (data, status) {
                $.alert({
                  title: "Registro excluido",
                  content: "O Livro" + data + "foi excluido",
                  type: "red",
                  typeAnimated: true,
                  buttons: {
                    ok: function () {
                      $(location).attr("href", "cad_livro.php");
                    },
                  },
                });
              }
            );
          },
        },
        cancelar: function () {},
      },
    });
  });
});
