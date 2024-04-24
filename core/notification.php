<?php

    $json_data = file_get_contents("php://input");

    // Décoder le JSON en tableau associatif
    $data = json_decode($json_data, true);

    $transaction_id = $data['codePaiement'];
    //echo json_encode($data);

    $credential_id = '8AW8V98';

    $data = array(
        "credential_id" => $credential_id,
        "transaction_id" => $transaction_id
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://paysecurehub.tresormoney.ci/payhub-ws/transaction/status',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>json_encode($data, JSON_PRETTY_PRINT),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    
    $object = json_decode($response);

    if ($object->statut_code == 200)
    {

        $update_data = array(
            "records" => array(
                array(
                    "id" => $transaction_id,
                    "fields" => array(
                        "Moyen De Paiement" => $object->data->service_lib,
                        "Reference De Paiement" => $object->data->provider_id,
                        "TransactionStatut" => $object->data->state,
                        "Date De Paiement" => $object->data->updated_at,
                        "statut" => "ok",
                        "Numero De Transaction" =>  $object->data->no_transaction
                    )
                )
            )
        );

    }else{
        
        $update_data = array(
            "records" => array(
                array(
                    "id" => $transaction_id,
                    "fields" => array(
                        "Moyen De Paiement" => $object->data->service_lib,
                        "TransactionStatut" => $object->data->state,
                        "statut" => "Nok",
                        "Numero De Transaction" =>  $object->data->no_transaction
                    )
                )
            )
        );

    }


    $curl = curl_init();
    curl_setopt_array($curl, array(

        CURLOPT_URL => "https://api.airtable.com/v0/appHQucHvSDAOanyW/Rotary-Gala",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PATCH',
        CURLOPT_POSTFIELDS => json_encode($update_data, JSON_PRETTY_PRINT),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer patPCdm7gTxXmZZ3f.38dfbec4f1c1908aaf1bb55696e28555647f12df0b3476c2acca28b72bffbb24'
          ),
    ));
    
    $update_record_response = curl_exec($curl);
    curl_close($curl);

    $message = $object->data->state;
    
    echo json_encode(array("message"=> $message, "status" => $object->statut_code));

?>