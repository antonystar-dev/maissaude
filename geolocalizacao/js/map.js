
// Váriáveis necessárias
var map;
var infoWindow;
// A variável markersData guarda a informação necessária a cada marcador
// Para utilizar este código basta alterar a informação contida nesta variável
var markersData = [
    {
        lat: -15.8252563,
        lng: -48.1210291,
        nome: "UPA de Ceilândia",
        morada1: "St. N Quadra QNN 27 Área Especial D - Ceilândia, Brasília - DF",
        morada2: " Cep 72225-270",
        morada3: "(61) 3371-1302",
        codPostal: "<form name='frmBusca' method='post' action='../termo-pesquisa.php'target='pesquisa'><input type='hidden' name='palavra' value='Upa Ceilandia'><input type='submit' value='Listar Serviços' target='_blank'/></form>",
        imagens: "../imagens/logo-MS-mini.png" // não colocar virgula no último item de cada maracdor
    },
    {
        lat: -15.8153222,
        lng: -48.0960858,
        nome: "Hospital Ceilandia",
        morada1: "St. N AE Bl D - Ceilândia, Brasília - DF",
        morada2: "Cep 72215-150",
        morada3:"(61) 3371-3049",
        codPostal: "<form name='frmBusca' method='post' action='../termo-pesquisa.php'target='pesquisa'><input type='hidden' name='palavra' value='Hospital Ceilandia'><input type='submit' value='Listar Serviços' target='_blank'/></form>",
        imagens: "../imagens/logo-MS-mini.png" // não colocar virgula no último item de cada maracdor
    },
    {
        lat: -15.8245596,
        lng: -48.1134707,
        nome: "Hospital Ceilândia",
        morada1: "Posto de Saúde Nº10 - Ceilândia",
        morada2: "CEILÂNDIA",
        codPostal: "<form name='frmBusca' method='post' action='../termo-pesquisa.php'target='pesquisa'><input type='hidden' name='palavra' value='Posto de Saúde Nº10'><input type='submit' value='Listar Serviços' target='_blank'/></form>",
        imagens: "../imagens/logo-MS-mini.png" // não colocar virgula no último item de cada maracdor

               
    }, 
    {
        lat: -15.8222797,
        lng: -48.0703857,
        nome: "Hospital de Taguatinga",
        morada1: "St. C Norte Área Especial 24 - Taguatinga Norte, Brasília - DF",
        morada2: "Cep 72120-970",
        morada3:"(61) 3353-1000",
        codPostal: "<form name='frmBusca' method='post' action='../termo-pesquisa.php'target='pesquisa'><input type='hidden' name='palavra' value='Hospital Taguatinga'><input type='submit' value='Listar Serviços' target='_blank'/></form>",
        imagens: "../imagens/logo-MS-mini.png" // não colocar virgula no último item de cada maracdor

               
    }, 
    {
        lat: -16.0401964,
        lng: -48.038401,
        nome: "Hospital de Santa Maria",
        morada1: "AC 102, Blocos A, B, C e D - Santa Maria - Santa Maria, Brasília - DF",
        morada2: "Cep 72502-100",
        morada3:"(61) 3392-6015",
        codPostal: "<form name='frmBusca' method='post' action='../termo-pesquisa.php'target='pesquisa'><input type='hidden' name='palavra' value='Hospital Santa Maria'><input type='submit' value='Listar Serviços' target='_blank'/></form>",
        imagens: "../imagens/logo-MS-mini.png" // não colocar virgula no último item de cada maracdor

               
    }, 
    {
        lat: -15.8834545,
        lng: -48.1023554,
        nome: "UPA 24h Samambaia",
        morada1: "QS 107 - Samambaia, Brasília - DF",
        morada2: "(61) 3459-3282",
        codPostal: "<form name='frmBusca' method='post' action='../view/termo-pesquisa.php'target='pesquisa'><input type='hidden' name='palavra' value='upa samambaia'><input type='submit' value='Listar Serviços' target='_blank'/></form>",
        imagens: "../imagens/logo-MS-mini.png" // não colocar virgula no último item de cada maracdor

               
    } 
];


function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(40.601203, -8.668173),
        zoom: 9,
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
        var codPostal = markersData[i].codPostal;
        var imagens = markersData[i].imagens;

        createMarker(latlng, nome, morada1, morada2, codPostal, imagens);

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
function createMarker(latlng, nome, morada1, morada2, codPostal, imagens) {
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
                '<div class="iw_content">' + morada1 + '<br />' +
                morada2 + '<br />' +
                codPostal + '</div></div>';

        // O conteúdo da variável iwContent é inserido na Info Window.
        infoWindow.setContent(iwContent);

        // A Info Window é aberta.
        infoWindow.open(map, marker);
    });
}