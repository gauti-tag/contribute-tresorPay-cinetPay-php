

<?php

function getHtml($url,$post) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer patPCdm7gTxXmZZ3f.38dfbec4f1c1908aaf1bb55696e28555647f12df0b3476c2acca28b72bffbb24','Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    
    
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$idenreg=$_POST["idenreg"];

$urli="https://api.airtable.com/v0/appHQucHvSDAOanyW/Rotary-Gala";

$possd=['statut' => 'OK'
    
];


$finaldata='{
  "records": [
    {
 "id": "'.$idenreg.'",
      "fields": '.json_encode($possd).'
    }
  ]
}';

$resultrrr=getHtml($urli,$finaldata);
$jsonresultat=json_decode($resultrrr);
if(isset($jsonresultat->records)){
    echo "success";
   
}


?>

