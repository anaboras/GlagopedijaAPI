<?php

require 'vendor/autoload.php';
use Composer\Autoload\ClassLoader;

Flight::route('/', function(){
  $poruka=new stdClass();
  $poruka->tekst="Nepotpuni zahtjev";
  $poruka->kod=1;
  $poruka->greska=true;
  $poruka->detalji="https://upute.app.hr/blog/api/v1/greske/7";
  $odgovor=new stdClass();
  $odgovor->poruka=$poruka;
  Flight::json($odgovor);
});

/* GET /v1/jezici array 
*/
Flight::route('GET /v1/jezici', function(){
    
   $doctrineBootstrap = Flight::entityManager();
   $em = $doctrineBootstrap->getEntityManager();
   $repozitorij=$em->getRepository('Glagopedija\Jezik');
   $jezici = $repozitorij->findAll();

   echo $doctrineBootstrap->getJson($jezici);

});

/* GET /v1/grupe?jezik=$jezik array
 */
Flight::route('GET /v1/grupe', function(){
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $grupejezici=$em->getRepository('Glagopedija\GrupaJezik')->findBy(array('jezik' => $jezik));
  echo $doctrineBootstrap->getJson($grupejezici);
});

/*GET /v1/grupa?id=$id&jezik=$jezik object
*/
Flight::route('GET /v1/grupa', function(){
  //dohvaćanje query parametra 'id'
  $id = Flight::request()->query->id;
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $grupa=$em->getRepository('Glagopedija\Grupa')->findBy(array('id' => $id, 'naziv' => $jezik));
  echo $doctrineBootstrap->getJson($grupa);
});


/* GET /v1/kategorije?kategorija=$id&jezik=$jezik array 
*/
Flight::route('GET /v1/kategorije', function(){
  //dohvaćanje query parametra 'kategorija'
  $kategorija = Flight::request()->query->kategorija;
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $kategorija=$em->getRepository('Glagopedija\KategorijaJezik')->findBy(array('kategorija' => $kategorija, 'jezik' => $jezik));
  echo $doctrineBootstrap->getJson($kategorija);
});

/* 
GET /v1/kategorija?id=$id&grupa=$grupa object
*/
Flight::route('GET /v1/kategorija', function(){
  //dohvaćanje query parametra 'kategorija'
  $id = Flight::request()->query->id;
  //dohvaćanje query parametra 'jezik'
  $grupa = Flight::request()->query->grupa;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $kategorija=$em->getRepository('Glagopedija\Kategorija')->findBy(array('id' => $id, 'grupa' => $grupa));
  echo $doctrineBootstrap->getJson($kategorija);
});


/* GET /v1/zapisi?kategorija=$kategorija&jezik=$jezik array 
*/
Flight::route('GET /v1/zapisi', function(){
  //dohvaćanje query parametra 'kategorija'
  $kategorija = Flight::request()->query->kategorija;
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $zapisi=$em->getRepository('Glagopedija\ZapisJezik')->findBy(array('kategorija' => $kategorija, 'jezik' => $jezik));
  echo $doctrineBootstrap->getJson($zapisi);
}); 


/* GET /v1/zapis?id=$id&jezik=$jezik object
*/ 
Flight::route('GET /v1/zapis', function(){
  //dohvaćanje query parametra 'id'
  $id = Flight::request()->query->id;
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $zapis=$em->getRepository('Glagopedija\Zapis')->findBy(array('id' => $id, 'jezik' => $jezik));
  echo $doctrineBootstrap->getJson($zapis);
});

/* GET /v1/poruke?jezik=$jezik array
*/ 
Flight::route('GET /v1/poruke', function(){
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $porukejezik=$em->getRepository('Glagopedija\PorukeJezik')->findBy(array('jezik' => $jezik));
  echo $doctrineBootstrap->getJson($porukejezik);
});

/* GET /v1/poruka?id=$id&jezik=$jezik
*/
Flight::route('GET /v1/poruka', function(){
  //dohvaćanje query parametra 'id'
  $id = Flight::request()->query->id;
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $poruka=$em->getRepository('Glagopedija\PorukeJezik')->findBy(array('poruka' => $id, 'jezik' => $jezik));
  echo $doctrineBootstrap->getJson($poruka);
});

/* GET /v1/popisliterature array
*/
Flight::route('GET /v1/popisliterature', function(){
    
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij=$em->getRepository('Glagopedija\PopisLiterature');
  $popisliterature = $repozitorij->findAll();

  echo $doctrineBootstrap->getJson($popisliterature);

});

/* GET /v1/informacije array
*/
Flight::route('GET /v1/informacije', function(){
    
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij=$em->getRepository('Glagopedija\Informacije');
  $informacije = $repozitorij->findAll();

  echo $doctrineBootstrap->getJson($informacije);

});


$cl = new ClassLoader('Glagopedija',__DIR__ . '/src');
$cl->register();
require_once 'bootstrap.php';
Flight::register('entityManager','DoctrineBootstrap');


Flight::start();