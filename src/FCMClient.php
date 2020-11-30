<?php

namespace FCM;

class FCMClient
{
    private $apiKey;
    private $url = "https://fcm.googleapis.com/fcm/send";

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function send(array $registration_ids = [], string $title, string $body)
    {
        $curl = curl_init();

        $payload = (object) [
            'registration_ids' => $registration_ids,
            'notification' => [
                'title' => $title,
                'body' => $body
            ]
        ];

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/json",
                "Authorization: key=$this->apiKey"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo json_encode($response);
        echo $response;
    }
}
