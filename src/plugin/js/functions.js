$(document).ready(function() {
    $("#btn-save").click(function() {
        var empresa = $("#empresa").val();
        var cnpj = $("#cnpj").val();
        var setor = $("#setor").val();
        var plano = $("#plano").val();
        var data_inicio = $("#data-inicio").val();

       if (empresa === '') {
            $.alert({
                title: 'Campo Vazio!',
                content: 'Digite o nome da empresa corretamente!',
                type: 'red',
                typeAnimated: true,
            });
        }
        else if (cnpj === '') {
            $.alert({
                title: 'Campo Vazio!',
                content: 'Digite o CNPJ!',
                type: 'red',
                typeAnimated: true,
            });
        }
        else {
            $.post('controller/add_company.php?&empresa='+empresa+'&cnpj='+cnpj+'&setor='+setor+'&plano='+plano+'&data_inicio='+data_inicio, function(data, status){
                $.alert({
                    title: 'Inclusão de Registros',
                    content: data,
                    type: 'green',
                    typeAnimated: true,
                    buttons: {
                        ok: function () {
                            $(location).attr('href', 'add_company.php')

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


      





