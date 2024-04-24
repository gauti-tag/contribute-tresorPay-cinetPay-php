
<?php


$raciness="https://www.odyssee-ci.com";


function getHtml($url,$post) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    
    
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
$telss=$_POST["tel"];
$nmail=$_POST["mailclient"];
$montant=$_POST["montant"];
$idenreg=$_POST["idenreg"];
$nomparticip=$_POST["nomparticip"];
$imontant=1*$montant;
$urli="https://api-checkout.cinetpay.com/v2/payment";

$possd=["apikey" => "15599356935f9fe338d62813.85924292",
    "site_id" =>"939479",
    "transaction_id" =>  "1246898555", 
    "amount" => $imontant,
    "currency" => "XOF",
    "alternative_currency" => "",
    "description" => "Desddfffkfffgggjgjgjgj fjffddkfdkfkdkdkdkdfk dsskddjdkdjdjdjk",
    "customer_id" => $idenreg,
    "customer_name" => $nomparticip,
    "customer_surname" => "Pour le GALA",
    "customer_email" => $nmail,
    "customer_phone_number" => $telss,
    "customer_address" => "Abidjan",
    "customer_city" => "Abidjan",
    "customer_country" => "CI",
    "customer_state" => "CI",
    "customer_zip_code" => "99326",
    "notify_url" => "https://www.odyssee-ci.com",
    "return_url" =>  "https://www.odyssee-ci.com",
    "channels" => "MOBILE_MONEY",
    "metadata" => "user1",
    "lang" => "FR",
    "invoice_data" => [
        "Donnee1"=> "",
        "Donnee2"=>  "",
        "Donnee3"=>  ""
    ]

];




$resultrrr=getHtml($urli,json_encode($possd));
echo $resultrrr;


?>

