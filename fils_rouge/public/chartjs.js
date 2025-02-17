
    const g = document.getElementById('graph')

    const data = [
      { label: "recettes", 
        count: g.dataset.recettesPublie, 
        labelCount : "publiée(s)" , 
        other : g.dataset.recettesNonPublie ,
        labelOther : "non publiée(s)" 
      },
      { label: "catégories", 
        labelCount : "publiée(s)" ,
        count: g.dataset.categories 
      },
      { label: "utilisateurs", 
        count: g.dataset.usersAdmin, 
        labelCount : "admin(s)" , 
        other : g.dataset.usersRedacteur ,
        labelOther : "rédacteur(s)"
      },
      { label: "commentaires", 
        count: g.dataset.commentairesActif, 
        labelCount : "actif(s)" , 
        other : g.dataset.commentairesInactif , 
        labelOther : "inactif(s)"  
      },
    ];
    
    Chart.register(ChartDataLabels);
    new Chart(g ,
      {
        type: 'bar',
        data: {
          labels: data.map(row => row.label),
          datasets: [
            {
              data: data.map(row =>  row.count  ),
              info: data.map(row =>  row.labelCount  ),
              backgroundColor: ["#27445D", "#3674B5", "#B5828C", "#5B913B"]
            },
            {
              data: data.map(row =>  row.other  ),
              info: data.map(row =>  row.labelOther ),
              backgroundColor: ["#497D74", "#578FCA", "#E5989B", "#77B254"]
            }
          ]
        },
        options: {
            scales: {
              x: {
                stacked: true,
              },
              y: {
                stacked: true
              }
            },
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    anchor: 'center', // Position of the labels (start, end, center, etc.)
                    align: 'center', // Alignment of the labels (start, end, center, etc.)
                    color: '#fff', // Color of the labels
                    font: {
                        weight: 'bold',
                        size: 15,
                    },
                    formatter: function (value, context) {
                      const index = context.dataIndex;
                      const label = context.dataset.info[index];
                     // console.log(context.datasetIndex);
                     if(value){
                      return value + " " + label; // Display the actual data value
                     }
                        
                    }
                },
                
            }
        }
      }
    );