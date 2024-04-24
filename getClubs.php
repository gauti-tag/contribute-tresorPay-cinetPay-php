

<?php

function getHtml($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer patPCdm7gTxXmZZ3f.38dfbec4f1c1908aaf1bb55696e28555647f12df0b3476c2acca28b72bffbb24'));
    
    
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$urli="https://api.airtable.com/v0/appHQucHvSDAOanyW/Liste-Clubs-RotaryCI";

$resultrrr=getHtml($urli);
$jsonresultat=json_decode($resultrrr);
if(isset($jsonresultat->records)){
    $totalm=$jsonresultat->records;
    $cptdepart=count($totalm);
    $ik=0;
    while($ik<$cptdepart){
        ?>
        <option>
     <?php  echo  ($totalm[$ik]->fields)->Clubs; ?>
       </option>
    
     <?php
     $ik=$ik+1;
    }
}
?>

