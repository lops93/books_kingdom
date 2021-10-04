$(document).ready(function() {
    $("#btn-save").click(function() {
        var titulo = $("#titulo").val();
        var autor = $("#autor").val();
        var avaliacao = $("#avaliacao").val();
        var qtde_votos = $("#qtde_votos").val();
       if (titulo === '') {
            $.alert({
                title: 'Campo Vazio!',
                content: 'Digite o titulo do livro corretamente!',
                type: 'red',
                typeAnimated: true,
            });
        }
        else if (autor === '') {
            $.alert({
                title: 'Campo Vazio!',
                content: 'Digite o nome do autor!',
                type: 'red',
                typeAnimated: true,
            });
        }
        else {
            $.post('../../src/controller/add_livro.php?&titulo='+titulo+'&autor='+autor+'&avaliacao='+avaliacao+
            '&qtde_votos='+qtde_votos, function(data, status){
                $.alert({
                    title: 'Inclusão de Registros',
                    content: data,
                    type: 'green',
                    typeAnimated: true,
                    buttons: {
                        ok: function () {
                            $(location).attr('href', 'cad_livro.php')

                        },

                    }

                });
            });
        }
      });

      $("#btn-search").click(function() {
        var dt_inicial = $("#dt-inicial").val();
        var dt_final = $("#dt-final").val();
        alert(dt_inicial);
      });

      $("#menu-cadastro").click(function() {
        $("#sub-menu_cadastro").toggle(500);
      });
      $("#menu-relatorio").click(function() {
        $("#sub-menu_relatorio").toggle(500);
      });
        
     

    
    
  });


      





