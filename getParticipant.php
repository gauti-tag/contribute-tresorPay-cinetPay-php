

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
$idenreg=$_POST["idenreg"];

$urli="https://api.airtable.com/v0/appHQucHvSDAOanyW/Rotary-Gala/".$idenreg;

$resultrrr=getHtml($urli);
$jsondeopn=json_decode($resultrrr);

echo $jsondeopn->id."|".str_replace("+225","",($jsondeopn->fields)->Whatsapp,$count)."|".(($jsondeopn->fields)->Email)."|".(($jsondeopn->fields)->Name)."|".(($jsondeopn->fields)->aPayer)."|".(($jsondeopn->fields)->statut)."|".(($jsondeopn->fields)->Places)."|33090642464ee1c640d6e35.22816872|264358";

?>

