// Váriáveis necessárias
var map;
var infoWindow;
// A variável markersData guarda a informação necessária a cada marcador
// Para utilizar este código basta alterar a informação contida nesta variável

var nomeunid = document.getElementsByClassName('nomeunid');
var endereco = document.getElementsByClassName('endereco');
var cep = document.getElementsByClassName('cep');
var telefone = document.getElementsByClassName('telefone');
var longetude = document.getElementsByClassName('longetude');
var latitude = document.getElementsByClassName('latitude');
var imagem = document.getElementsByClassName('imagem');
var teste=document.getElementsByClassName('asdf');


//alert(empresa.length);
var markersData = [];
for (i = 0; i < nomeunid.length; i++) {
    markersData[i] = {
        lat: latitude[i].value,
        lng: longetude[i].value,
        nome: nomeunid[i].value,
        morada1: endereco[i].value,
        morada2: cep[i].value,
        morada3: telefone[i].value,
       //codPostal: "<form name='frmBusca' method='post' action='../../termo-pesquisa.php'target='pesquisa'><input type='hidden' name='palavra' value=''><input type='submit' value='Listar Serviços' target='_blank'/></form>",
      codPostal: "<form name='frmBusca' method='post' action='../../termo-pesquisa.php'target='pesquisa'><input type='hidden' name='palavra' value='"+teste[i].value+"'><input type='submit' value='Serviços' target='_blank'/></form>",

        imagens: "../upload/" + imagem[i].value
    };
}

function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(-15.8176206,-48.1926757),
        zoom: 11,
        mapTypeId: 'roadmap',
    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    // cria a nova Info Window com referência à variável infowindow
    // o conteúdo da Info Window será atribuído mais tarde
    infoWindow = new google.maps.InfoWindow();

    // evento que fecha a infoWindow com click no mapa
    google.maps.event.addListener(map, 'click', function () {
        infoWindow.close();
    });

    // Chamada para a função que vai percorrer a informação
    // contida na variável markersData e criar os marcadores a mostrar no mapa
    displayMarkers();
}
google.maps.event.addDomListener(window, 'load', initialize);

// Esta função vai percorrer a informação contida na variável markersData
// e cria os marcadores através da função createMarker
function displayMarkers() {

    // esta variável vai definir a área de mapa a abranger e o nível do zoom
    // de acordo com as posições dos marcadores
    var bounds = new google.maps.LatLngBounds();

    // Loop que vai estruturar a informação contida em markersData
    // para que a função createMarker possa criar os marcadores 
    for (var i = 0; i < markersData.length; i++) {

        var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
        var nome = markersData[i].nome;
        var morada1 = markersData[i].morada1;
        var morada2 = markersData[i].morada2;
        var morada3 = markersData[i].morada3;
        var codPostal = markersData[i].codPostal;
        var imagens = markersData[i].imagens;

        createMarker(latlng, nome, morada1, morada2, morada3, codPostal, imagens);

        // Os valores de latitude e longitude do marcador são adicionados à
        // variável bounds
        bounds.extend(latlng);
    }

    // Depois de criados todos os marcadores
    // a API através da sua função fitBounds vai redefinir o nível do zoom
    // e consequentemente a área do mapa abrangida.
    map.fitBounds(bounds);
}
//var image = '../images/photo.png';
// Função que cria os marcadores e define o conteúdo de cada Info Window.
function createMarker(latlng, nome, morada1, morada2, morada3, codPostal, imagens) {
    var marker = new google.maps.Marker({
        map: map,
        icon: imagens,
        position: latlng,
        title: nome,
        animation: google.maps.Animation.DROP
    });
    // Evento que dá instrução à API para estar alerta ao click no marcador.
    // Define o conteúdo e abre a Info Window.
    google.maps.event.addListener(marker, 'click', function () {

        // Variável que define a estrutura do HTML a inserir na Info Window.
        var iwContent = '<div id="iw_container">' +
                '<div class="iw_title">' + nome + '</div>' +
                '<div class="iw_content"> Endereço: ' + morada1 + '<br />CEP: ' + morada2 + '<br /> Telefone: ' + morada3 + '<br />' +
                codPostal + '</div>\n\
                          </div>';

        // O conteúdo da variável iwContent é inserido na Info Window.
        infoWindow.setContent(iwContent);

        // A Info Window é aberta.
        infoWindow.open(map, marker);
    });
}