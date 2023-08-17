mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FicmllbHRvYmlhcyIsImEiOiJjajk1aXlucXQ0ajlmMnJuNWIyNTk0MDh0In0.4jzoqJk5kVipejQFT8WKjQ';
// Set bounds to New York, New York


var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [-57.362889,-15.0539228],
    zoom: 3.5,
    //interactive: false
});


    $(document).ready(function(){
        $.ajax({
            type:'post',		//Definimos o método HTTP usado
            dataType: 'json',	//Definimos o tipo de retorno
            url: '../triagem/getDados.php',//Definindo o arquivo onde serão buscados os dados
        })
        .done(function(response) {

            for(var i=0;response.length>i;i++) {
                if (response[i].regiao == "Norte") {
                    var triagem = [-68.8934994,-4.1587009];
                }else if(response[i].regiao == "Sul"){
                    var triagem = [-53.2594143,-26.8125822];
                }else if(response[i].regiao == "Sudeste"){
                    var triagem = [-50.0076558,-19.5462901];
                }else if(response[i].regiao == "Nordeste"){
                    var triagem = [-41.7635265,-11.0693798];
                }else if(response[i].regiao == "Centro Oeste"){
                    var triagem = [-62.8104146,-15.5169731];
                }else{
                  var triagem = [0,0];
                }
                var popup = new mapboxgl.Popup()
                  .setText('Construction on the Washington Monument began in 1848.')
                  .setHTML('<div class="panel panel-default"><div class="panel-body"><p class="lead">'+ response[i].regiao + '<\//p><p><strong>Produtos previstos: </strong><p><strong>Produtos triados: </strong><p><strong>Recuperados:</strong><p><strong>Devolução:</strong> xxxx<p><strong>Performance:</strong><p></div></div>')
                  .addTo(map);
                  // create DOM element for the marker
                  var el = document.createElement('div');
                  el.id = 'marker';
                  new mapboxgl.Marker(el)
                  .setLngLat(triagem)
                  .setPopup(popup) // sets a popup on this marker
                  .addTo(map);
            }
        })

    });
