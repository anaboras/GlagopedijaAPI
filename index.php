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
  $grupa=$em->getRepository('Glagopedija\Grupa')->findAll();
  $grupaJezik=$em->getRepository('Glagopedija\GrupaJezik')->findBy(array('jezik' => $jezik));
  foreach($grupa as $g){
    foreach($grupaJezik as $gj){
      if($gj->getGrupa()===$g->getId() && $gj->getJezik()===$jezik){
        $g->setNaziv($gj->getVrijednost());
      break;
      }
  }
}

  //$grupejezici=$em->getRepository('Glagopedija\GrupaJezik')->findBy(array('jezik' => $jezik));
  echo $doctrineBootstrap->getJson($grupa);
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
  $grupa=$em->getRepository('Glagopedija\Grupa')->findBy(array('id' => $id))[0];
  $grupaJezik=$em->getRepository('Glagopedija\GrupaJezik')->findBy(array('grupa' => $grupa, 'jezik'=>$jezik));
  if ($grupaJezik!=null){
    $grupa->setNaziv($grupaJezik[0]->getVrijednost());
  }
 
  echo $doctrineBootstrap->getJson($grupa);
});


/* GET /v1/kategorije?kategorija=$id&jezik=$jezik array 
*/
Flight::route('GET /v1/kategorije', function(){
  //dohvaćanje query parametra 'kategorija'
  $grupa = Flight::request()->query->grupa;
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $kategorija=$em->getRepository('Glagopedija\Kategorija')->findBy(array('grupa' => $grupa));
  $kategorijaJezik=$em->getRepository('Glagopedija\KategorijaJezik')->findBy(array('jezik' => $jezik));
  foreach($kategorija as $g){
    foreach($kategorijaJezik as $gj){
      //echo $gj->getKategorija() . "," . $g->getId() . "," . $gj->getJezik() . "," . $jezik . "<hr />" ;
        if($gj->getKategorija()===$g->getId() && $gj->getJezik()===$jezik){
        //  echo $gj->getVrijednost() . ",";
          $g->setNaziv($gj->getVrijednost());
        break;
        }
    }
  }
  echo $doctrineBootstrap->getJson($kategorija);
});

/* 
GET /v1/kategorija?id=$id&grupa=$grupa object
*/
Flight::route('GET /v1/kategorija', function(){
  //dohvaćanje query parametra 'kategorija'
  $id = Flight::request()->query->id;
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $kategorija=$em->getRepository('Glagopedija\Kategorija')->findBy(array('id' => $id))[0];
  //echo $doctrineBootstrap->getJson($kategorija);
  $kategorijaJezik=$em->getRepository('Glagopedija\KategorijaJezik')->findBy(array('kategorija' => $kategorija, 'jezik'=>$jezik));
  if ($kategorijaJezik!=null){
    $kategorija->setNaziv($kategorijaJezik[0]->getVrijednost());
  }

  echo $doctrineBootstrap->getJson($kategorija);
});


/* GET /v1/zapisi?kategorija=$kategorija&jezik=$jezik array 
*/
Flight::route('GET /v1/zapisi', function(){
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  //dohvaćanje query parametra 'kategorija'
  $kategorija = Flight::request()->query->kategorija;
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $zapisi=$em->getRepository('Glagopedija\Zapis')->findBy(array('kategorija' => $kategorija));

  $zapisJezik=$em->getRepository('Glagopedija\ZapisJezik')->findBy(array('jezik' => $jezik));
  
  foreach($zapisi as $g){
    foreach($zapisJezik as $gj){
        if($gj->getZapis()===$g->getId() && $gj->getJezik()===$jezik){
          $g->setNaziv($gj->getNaziv());
          $g->setKategorija($gj->getKategorija());
          $g->setMjesto($gj->getMjesto());
          $g->setGodina($gj->getGodina());
          $g->setPismo($gj->getPismo());
          $g->setJezik($gj->getJezik());
          $g->setSadrzaj($gj->getSadrzaj());
          $g->setVelicina($gj->getVelicina());
          $g->setZanimljivosti($gj->getZanimljivosti());
          $g->setVrijeme($gj->getVrijeme());
          $g->setDanasnjePocivaliste($gj->getDanasnjePocivaliste());
        break;
        }
    }
  }


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
  $zapis=$em->getRepository('Glagopedija\Zapis')->findBy(array('id' => $id))[0];
  $zapisJezik=$em->getRepository('Glagopedija\ZapisJezik')->findBy(array('zapis' => $id, 'jezik'=>$jezik));
  if ($zapisJezik!=null){
    $zapis->setNaziv($zapisJezik[0]->getNaziv());
    $zapis->setKategorija($zapisJezik[0]->getKategorija());
    $zapis->setMjesto($zapisJezik[0]->getMjesto());
    $zapis->setGodina($zapisJezik[0]->getGodina());
    $zapis->setPismo($zapisJezik[0]->getPismo());
    $zapis->setJezik($zapisJezik[0]->getJezik());
    $zapis->setSadrzaj($zapisJezik[0]->getSadrzaj());
    $zapis->setVelicina($zapisJezik[0]->getVelicina());
    $zapis->setZanimljivosti($zapisJezik[0]->getZanimljivosti());
    $zapis->setVrijeme($zapisJezik[0]->getVrijeme());
    $zapis->setDanasnjePocivaliste($zapisJezik[0]->getDanasnjePocivaliste());
  }

  
  echo $doctrineBootstrap->getJson($zapis);
});

/* GET /v1/poruke?jezik=$jezik array
*/ 
Flight::route('GET /v1/poruke', function(){
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $poruke=$em->getRepository('Glagopedija\Poruka')->findAll();
  $porukeJezik=$em->getRepository('Glagopedija\PorukeJezik')->findBy(array('jezik' => $jezik));
  foreach($poruke as $g){
    foreach($porukeJezik as $gj){
      //echo $gj->getVrijednost() . "<br />";
        if($gj->getPoruka()===$g->getKljuc()){
          $g->setOpis($gj->getVrijednost());
          break;
        }
    }
  }
  echo $doctrineBootstrap->getJson($poruke);
 
});

/* GET /v1/poruka?id=$id&jezik=$jezik
*/
Flight::route('GET /v1/poruka', function(){
  //dohvaćanje query parametra 'id'
  $kljuc = Flight::request()->query->kljuc;
  //dohvaćanje query parametra 'jezik'
  $jezik = Flight::request()->query->jezik;
  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $poruka=$em->getRepository('Glagopedija\Poruka')->findBy(array('kljuc' => $kljuc))[0];
  $zapisJezik=$em->getRepository('Glagopedija\PorukeJezik')->findBy(array('poruka' => $kljuc, 'jezik'=>$jezik));
  if ($zapisJezik!=null){
    $poruka->setOpis($zapisJezik[0]->getVrijednost());
  }
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