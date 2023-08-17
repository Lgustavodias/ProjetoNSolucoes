window.onload = function () {

  var chart = new CanvasJS.Chart("produto", {
    exportEnabled: true,
    animationEnabled: true,
    title:{
      text: "% DE PRODUTOS PARA TRIAR"
    },
    legend:{
      cursor: "pointer",
      itemclick: explodePie
    },
    data: [{
      type: "pie",
      showInLegend: true,
      toolTipContent: "{name}: <strong>{y}%</strong>",
      indexLabel: "{name} - {y}%",
      dataPoints: [
        { y: total_tablet_mes_p , name: "Tablet", exploded: true },
        { y: total_smart_mes_p , name: "Smart" },
        { y: total_feature_mes_p , name: "Feature Phone" },
        { y: total_radio_mes_p , name: "Rádio" },
        { y: total_gps_mes_p , name: "GPS" },
        { y: total_pc_mes_p , name: "PC" },
        { y: total_periferico_mes_p , name: "Periférico"}
      ]
    }]
  });
  chart.render();


}


function explodePie (e) {
  if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
  } else {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
  }
  e.chart.render();
}
//Pegando o total através dos painéis
var qtd_rec = document.getElementById('qtd_rec').innerHTML;
var qtd_dev = document.getElementById('qtd_dev').innerHTML;
var qtd_mu = document.getElementById('qtd_mu').innerHTML;
var qtd_fg = document.getElementById('qtd_fg').innerHTML;
//Somando
var total_produtos = parseInt(qtd_rec) + parseInt(qtd_dev) + parseInt(qtd_mu) + parseInt(qtd_fg);
//%
var qtd_rec_p1 = (qtd_rec/total_produtos)*100;
var qtd_dev_p1 = (qtd_dev_p/total_produtos)*100;
var qtd_mu_p1 = (qtd_mu_p/total_produtos)*100;
var qtd_fg_p1 = (qtd_fg_p/total_produtos)*100;
//Arredondando
var qtd_rec_p = qtd_rec_p1.toFixed(2);
var qtd_dev_p = qtd_dev_p1.toFixed(2);
var qtd_mu_p = qtd_mu_p1.toFixed(2);
var qtd_fg_p = qtd_fg_p1.toFixed(2);

//Pegando os totais por família
var total_tablet_mes = <?php echo $total_tablet_mes ?>;
var total_smart_mes = <?php echo $total_smart_mes ?>;
var total_feature_mes = <?php echo $total_feature_mes ?>;
var total_radio_mes = <?php echo $total_radio_mes ?>;
var total_gps_mes = <?php echo $total_gps_mes ?>;
var total_pc_mes = <?php echo $total_pc_mes ?>;
var total_periferico_mes = <?php echo $total_periferico_mes ?>;
//Total
var total_produtos_familia = parseInt(total_tablet_mes) + parseInt(total_smart_mes)+ parseInt(total_feature_mes)+ parseInt(total_radio_mes)+ parseInt(total_gps_mes)+ parseInt(total_pc_mes)+ parseInt(total_periferico_mes);

//%
var total_tablet_mes_p1 = (total_tablet_mes/total_produtos_familia)*100;
var total_smart_mes_p1 = (total_smart_mes/total_produtos_familia)*100;
var total_feature_mes_p1 = (total_feature_mes/total_produtos_familia)*100;
var total_radio_mes_p1 = (total_radio_mes/total_produtos_familia)*100;
var total_gps_mes_p1 = (total_gps_mes/total_produtos_familia)*100;
var total_pc_mes_p1 = (total_pc_mes/total_produtos_familia)*100;
var total_periferico_mes_p1 = (total_periferico_mes/total_produtos_familia)*100;

//Arredondando
var total_tablet_mes_p = total_tablet_mes_p1.toFixed(2);
var total_smart_mes_p = total_smart_mes_p1.toFixed(2);
var total_feature_mes_p = total_feature_mes_p1.toFixed(2);
var total_radio_mes_p = total_radio_mes_p1.toFixed(2);
var total_gps_mes_p = total_gps_mes_p1.toFixed(2);
var total_pc_mes_p = total_pc_mes_p1.toFixed(2);
var total_periferico_mes_p = total_periferico_mes_p1.toFixed(2);

//Total por mês
var total_tri_jan = <?php echo $total_tri_jan  ?>;
var total_rec_jan = <?php echo $total_rec_jan  ?>;
var total_dev_jan = <?php echo $total_dev_jan  ?>;

var total_tri_fev = <?php echo $total_tri_fev  ?>;
var total_rec_fev = <?php echo $total_rec_fev  ?>;
var total_dev_fev = <?php echo $total_dev_fev  ?>;

var total_tri_mar = <?php echo $total_tri_mar  ?>;
var total_rec_mar = <?php echo $total_rec_mar  ?>;
var total_dev_mar = <?php echo $total_dev_mar  ?>;

var total_tri_abr = <?php echo $total_tri_abr  ?>;
var total_rec_abr = <?php echo $total_rec_abr  ?>;
var total_dev_abr = <?php echo $total_dev_abr  ?>;

var total_tri_mai = <?php echo $total_tri_mai  ?>;
var total_rec_mai = <?php echo $total_rec_mai  ?>;
var total_dev_mai = <?php echo $total_dev_mai  ?>;

var total_tri_jun = <?php echo $total_tri_jun  ?>;
var total_rec_jun = <?php echo $total_rec_jun  ?>;
var total_dev_jun = <?php echo $total_dev_jun  ?>;

var total_tri_jul = <?php echo $total_tri_jul  ?>;
var total_rec_jul = <?php echo $total_rec_jul  ?>;
var total_dev_jul = <?php echo $total_dev_jul  ?>;

var total_tri_ago = <?php echo $total_tri_ago  ?>;
var total_rec_ago = <?php echo $total_rec_ago  ?>;
var total_dev_ago = <?php echo $total_dev_ago  ?>;

var total_tri_set = <?php echo $total_tri_set  ?>;
var total_rec_set = <?php echo $total_rec_set  ?>;
var total_dev_set = <?php echo $total_dev_set  ?>;

var total_tri_out = <?php echo $total_tri_out  ?>;
var total_rec_out = <?php echo $total_rec_out  ?>;
var total_dev_out = <?php echo $total_dev_out  ?>;

var total_tri_nov = <?php echo $total_tri_nov  ?>;
var total_rec_nov = <?php echo $total_rec_nov  ?>;
var total_dev_nov = <?php echo $total_dev_nov  ?>;

var total_tri_dez = <?php echo $total_tri_dez  ?>;
var total_rec_dez = <?php echo $total_rec_dez  ?>;
var total_dev_dez = <?php echo $total_dev_dez  ?>;

//Criando o gráfico
Morris.Donut({
element: 'produtos',
data: [
  {value: qtd_rec + "%" , label: 'Recuperado'},
  {value: qtd_dev + "%", label: 'Devolução'},
  {value: qtd_mu + "%", label: 'Mau uso'},
  {value: qtd_fg + "%", label: 'Fora de garantia'}
],
formatter: function (x) { return x + ""}
}).on('click', function(i, row){
console.log(i, row);
});


Morris.Bar({
  element: 'anual',
  data: [
    {x: 'Janeiro', tri: total_tri_jan, rec: total_rec_jan, dev: total_dev_jan},
    {x: 'Fevereiro', tri: total_tri_fev, rec: total_rec_fev, dev: total_dev_fev},
    {x: 'Março', tri: total_tri_mar, rec: total_rec_mar, dev: total_dev_mar},
    {x: 'Abril', tri: total_tri_abr, rec: total_rec_abr, dev: total_dev_abr},
    {x: 'Maio', tri: total_tri_mai, rec: total_rec_mai, dev: total_dev_mai},
    {x: 'Junho', tri: total_tri_jun, rec: total_rec_jun, dev: total_dev_jun},
    {x: 'Julho', tri: total_tri_jul, rec: total_rec_jul, dev: total_dev_jul},
    {x: 'Agosto', tri: total_tri_ago, rec: total_rec_ago, dev: total_dev_ago},
    {x: 'Setembro', tri: total_tri_set, rec: total_rec_set, dev: total_dev_set},
    {x: 'Outubro', tri: total_tri_out, rec: total_rec_out, dev: total_dev_out},
    {x: 'Novembro', tri: total_tri_nov, rec: total_rec_nov, dev: total_dev_nov},
    {x: 'Dezembro', tri: total_tri_dez, rec: total_rec_dez, dev: total_dev_dez}
  ],
  xkey: 'x',
  ykeys: ['tri', 'rec', 'dev'],
  labels: ['Triado', 'Recuperado', 'Devolução']
}).on('click', function(i, row){
  console.log(i, row);
});
