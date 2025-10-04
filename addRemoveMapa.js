var layers = {};

function addRemoverLayer(urlLayer, layerOptions, map, id, conteudo = '', titulo = ''){

    var checkbox = document.getElementById(id);

    if (checkbox.checked) {
        // Se o checkbox estiver marcado, cria a camada e a adiciona
        layers[id] = createLayer(urlLayer, layerOptions, map, id, conteudo, titulo);

    } else {
        // Se o checkbox estiver desmarcado, remove a camada do mapa
        if (layers[id]) {
        map.removeLayer(layers[id]);  // Remove a camada correta (cluster ou não)
        delete layers[id];  // Remove a referência da camada
        }
    }



}



// Função genérica para criar camadas e adicionar dados com ou sem marker cluster
function createLayer(urlLayer, layerOptions, map, id, conteudo, titulo) {

    var layer;

    // Cria uma camada GeoJSON normal (sem cluster)
    layer = L.geoJSON(null, layerOptions);

    var url = 'https://geoserverintranet.femarh.rr.gov.br/geoserver/cite/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:'+urlLayer+'&outputFormat=application/json';

    $.getJSON(url, function(data) {
        layer.addData(data);


        layer.on('click', function(e) {

        const props = e.layer.feature.properties;


        let contentPerFeature = conteudo.replace(/\{([\w_]+)\}/g, function(_, key) {
        let value = props[key];
        if ((key === 'area' || key === 'area_ha' || key === 'area_hecta' || key === 'hectares' || key === 'area_est_ha' || key === 'qtd_area_d' || key === 'area_km' || key === 'ha') && typeof value === 'number') {
            return value.toLocaleString('pt-BR', {
            minimumFractionDigits: 4,
            maximumFractionDigits: 4
            });
        }

            return (value !== undefined && value !== null) ? value : '-';
        });

        // Atualiza título
        document.getElementById('staticBackdropLabel').innerText = titulo;

        // Atualiza body
        document.getElementById('modalBody').innerHTML = contentPerFeature;

        // Abre modal usando Bootstrap
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        myModal.show();

        })

        map.addLayer(layer);  // Adiciona a camada normal ao mapa
        layers[id] = layer;  // Salva a camada para remoção futura


        return layer;  // Retorna a camada, caso seja necessário manipular depois

    })

}




var layers1 = {};

function addRemoverLayer2(layerOptions, map, id, conteudo = '', titulo = ''){

    var checkbox = document.getElementById(id);

    if (checkbox.checked) {
        // Se o checkbox estiver marcado, cria a camada e a adiciona
        layers1[id] = createLayer2(layerOptions, map, id, conteudo, titulo);

    } else {
        // Se o checkbox estiver desmarcado, remove a camada do mapa
        if (layers1[id]) {
        map.removeLayer(layers1[id]);  // Remove a camada correta (cluster ou não)
        delete layers1[id];  // Remove a referência da camada
        }
    }



}



// Função genérica para criar camadas e adicionar dados com ou sem marker cluster
function createLayer2(layerOptions, map, id, conteudo, titulo) {

    var layer;

    // Cria uma camada GeoJSON normal (sem cluster)


    var url = 'http://localhost/sig_nasa/';

    $.getJSON(url+'nasaTabela.php', function(data) {

        console.log(data);

        layer = L.geoJSON(data, {
            filter: function (features) {
                if(features.properties.gid == id){
                    return true
                }
            },
            color: "#FF8C00",
            weight: 2
        });


        layer.on('click', function(e) {

        const props = e.layer.feature.properties;


        let contentPerFeature = conteudo.replace(/\{([\w_]+)\}/g, function(_, key) {
        let value = props[key];
        if ((key === 'area' || key === 'area_ha' || key === 'area_hecta' || key === 'hectares' || key === 'area_est_ha' || key === 'qtd_area_d' || key === 'area_km' || key === 'ha') && typeof value === 'number') {
            return value.toLocaleString('pt-BR', {
            minimumFractionDigits: 4,
            maximumFractionDigits: 4
            });
        }

            return (value !== undefined && value !== null) ? value : '-';
        });

        // Atualiza título
        document.getElementById('staticBackdropLabel').innerText = titulo;

        // Atualiza body
        document.getElementById('modalBody').innerHTML = contentPerFeature;

        // Abre modal usando Bootstrap
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        myModal.show();

        })

        map.addLayer(layer);  // Adiciona a camada normal ao mapa
        layers1[id] = layer;  // Salva a camada para remoção futura


        return layer;  // Retorna a camada, caso seja necessário manipular depois

    })

}