<?php

$fichierDevise=file('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
foreach($fichierDevise as $ligne){
    $ligne=explode("'", $ligne);
        
    if (count($ligne)===5) {
        $numberToConvert=$_GET['number'];
        $amountconvert = getAmount($numberToConvert,$ligne[3]);
        echo '<pre>'.$numberToConvert.' € = '.$amountconvert." \t".$ligne[1]." \t\t".'Taux = '.$ligne[3].'</pre>';

    }
  
}

// echo "<pre>un \t un</pre>";         // Utilisation  de la tabulation avec des ""
// echo '<pre>un'." \t".' un</pre>';   // Utilisation  de la tabulation avec des ''



    function getAmount($numberToConvert,$taux) {

        $amountconvert=$numberToConvert*$taux;
        
        return $amountconvert;

    };