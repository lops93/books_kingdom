$(document).ready(function() {
    $.ajax({
        url: "http://localhost:8000/src/controller/graphics.php?grafico1=1",
        method: "GET",
        success: function(data) {
          //console.log(data);
          var titulo = [];
          var qtde_votos = [];
    
          for(var i in data) {
            titulo.push(data[i].titulo);
            qtde_votos.push(data[i].qtde_votos);
          }
    
          var chartdata = {
            labels: titulo,
            datasets : [
              {
                label: 'Quantidade de votos',
                backgroundColor: 
                  'rgba(54, 162, 235, 0.2)',
              borderColor: 
                'rgba(54, 162, 235, 1)',
            borderWidth: 1,
                hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                hoverBorderColor: 'rgba(200, 200, 200, 1)',
                data: qtde_votos
              }
            ]
          };
    
          var ctx = document.getElementById('myChart').getContext('2d');
    
          var myBarChart = new Chart(ctx, {
            type: 'horizontalBar',
            options: {
              title: {
                  display: true,
                  text: 'Verificando a popularidade dos livros de acordo com a quantidade de votos'
              }
          },
            data: chartdata
            
          });
        },
        error: function(data) {
          console.log(data);
        }
      });
        $.ajax({
        url: "http://localhost:8000/src/controller/graphics.php?grafico2=1",
        method: "GET",
        success: function(data) {
          //console.log(data);
          var genero = [];
          var qtde_votos = [];
    
          for(var i in data) {
            genero.push("Setor " + data[i].genero);
            qtde_votos.push(data[i].qtde_votos);
          }
    
          var chartdata = {
            labels: genero,
            datasets : [
              {
                label: 'Valor total por setor',
                 backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
                hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                hoverBorderColor: 'rgba(200, 200, 200, 1)',
                data: qtde_votos
              }
            ]
          };
    
          var ctx = document.getElementById('myChart2').getContext('2d');
    
          var myBarChart2 = new Chart(ctx, {
            type: 'pie',
            options: {
              title: {
                  display: true,
                  text: 'Verificando os gêneros mais populares de acordo com a quantidade de votos'
              }
          },
            data: chartdata
          });
        },
        error: function(data) {
          console.log(data);
        }
      });  


      var monthNames = [ "Jan", "Feb", "Mar", "Apr", "May"];
    
      var ctx = document.getElementById("myChart3");
       ctx.height = 300;  
      var myChart3 = new Chart(ctx, {
          type: 'line',
          data: {
              labels: monthNames,
              datasets: [{
                  label: "Net sales",
                  data: [20,30,40,50,60],
                  pointHoverBackgroundColor:  'rgb(255, 99, 132)',  
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
              },
              {
                  label: "Gross sales",
                  data: [20,60,40,80,70],
                  pointHoverBackgroundColor:  'rgb(66, 133, 244)',   
                  backgroundColor: [
                      'rgb(66, 133, 244, 0.2)',                 
                  ],
                  borderColor: [
                      'rgb(66, 133, 244)',                  
                  ],
                  borderWidth: 1
              }]
          },
          options: {
            maintainAspectRatio: false,
            title:{
              display: "true",
              text: "Sales ",
              fontSize: "18"
            },
            tooltips:{
              intersect:false,
              mode: 'index'
            },
            hover: {
              mode: 'index',
              intersect: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
          }
      });
      
    
});
