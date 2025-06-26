<?php
require 'vendor/autoload.php';

use GeoIp2\Database\Reader;

// Caminho para o banco de dados GeoLite2-City
$reader = new Reader('GeoLite2-City.mmdb');
/////////////////////////////mesclar codigo
// Obtém o endereço IP do cliente
$ip_address = $_SERVER['REMOTE_ADDR'];

// Obtém o agente do usuário (navegador)
$user_agent = $_SERVER['HTTP_USER_AGENT'];

echo "Endereço IP: " . $ip_address . "<br>";
echo "Agente do Usuário (Navegador): " . $user_agent;


///// tem que instalar via composser tem no packgist, e tem que baixar o golite2-city e mencionar o caminho, busque e ache esse arquivo.

echo "</br>";





// IP do visitante
$ip = $ip_address;

try {
    $registro = $reader->city($ip);
    $pais = $registro->country->name;
    $cidade = $registro->city->name;
$latitude = $registro->location->latitude;
    $longitude = $registro->location->longitude;
    echo "IP: " . $ip . "<br>";
 echo "Latitude: $latitude<br>";
    echo "Longitude: $longitude<br>";

    echo "Localização: " . $cidade . ", " . $pais;
} catch (Exception $e) {
    echo "Erro ao localizar IP: " . $e->getMessage();
}

?>
<iframe
  width="600"
  height="400"
  frameborder="0"
  scrolling="no"
  marginheight="0"
  marginwidth="0"
  src="https://www.openstreetmap.org/export/embed.html?bbox=<?= $longitude - 0.01 ?>,<?= $latitude - 0.01 ?>,<?= $longitude + 0.01 ?>,<?= $latitude + 0.01 ?>&layer=mapnik&marker=<?= $latitude ?>,<?= $longitude ?>">
</iframe>
<br/>
<small>
  <a href="https://www.openstreetmap.org/?mlat=<?= $latitude ?>&mlon=<?= $longitude ?>#map=14/<?= $latitude ?>/<?= $longitude ?>">
    Ver mapa ampliado
  </a>
</small>
