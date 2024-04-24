<?php 
$code_paiement = isset($_POST['code_paiement']) ? $_POST['code_paiement'] : '';
$prenom_usager = isset($_POST['prenom_usager']) ? $_POST['prenom_usager'] : '';
$montant = isset($_POST['montant']) ? $_POST['montant'] : '';
$nom_usager = isset($_POST['nom_usager']) ? $_POST['nom_usager'] : '';
$telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';


// send to TresorPay

$tresorpay_payment_url = "https://paysecurehub.tresormoney.ci/payhub-ws/build-away";
$transaction_id = $code_paiement;  
$payment_data = array(
        "code_paiement" => $transaction_id,
        "credential_id" => "8AW8V98",
        "nom_usager" => $nom_usager,
        "prenom_usager" => $prenom_usager,
        "telephone" => $telephone,
        "email" => "",
        "libelle_article" => "Rotary Contribution",
        "quantite" => 1,
        "montant" => $montant,
        "lib_order" => "ROTARY",
        "Url_Logo" => "",
        "pay_fees" => "0",
        "Url_Retour" => "https://topdigitalevel.site/contribution-ACD24/formulaire_du_gala.html",
        "Url_Callback" => "https://topdigitalevel.site/contribution-ACD24/core/notification.php"    
);

$request = curl_init($tresorpay_payment_url);
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
curl_setopt($request, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($payment_data));
curl_setopt($request, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);

$payment_response = curl_exec($request);
$payment_err = curl_error($request);

curl_close($request);

if ($payment_err){
    $message = "Erreur lors du paiement: $payment_err";
    }

    // UPDATE TO AIRTABLE
    $api_url = "https://api.airtable.com/v0/appHQucHvSDAOanyW/Rotary-Gala";
    $api_key = "patPCdm7gTxXmZZ3f.38dfbec4f1c1908aaf1bb55696e28555647f12df0b3476c2acca28b72bffbb24";

    $headers = array(
        "Authorization: Bearer " . $api_key,
        "Content-Type: application/json"
    );

    $message = "Lien de paiement genere avec succes.";

    $object = json_decode($payment_response);
    $url_generated = $object->url;

    $current_date = date('d-m-Y h:i:s');

    $update_data = array(
        "records" => array(
            array(
                "id" => $transaction_id,
                "fields" => array(
                    "Lien De Paiement" => $url_generated,
                    "TransactionID" => $transaction_id,
                    "TransactionStatut" => "En attente de confirmation",
                    "Date Ordre De Paiement" => $current_date
                )
            )
        )
    );

    $curl = curl_init();
    curl_setopt_array($curl, array(

        CURLOPT_URL => $api_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PATCH',
        CURLOPT_POSTFIELDS => json_encode($update_data, JSON_PRETTY_PRINT),
        CURLOPT_HTTPHEADER => $headers,
    ));
    
    $update_record_response = curl_exec($curl);
    curl_close($curl);
    echo json_encode(array("message" => $message, "url" => trim($url_generated)));