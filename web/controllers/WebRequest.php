<?php 
    $msg = "";

    include_once('./view/pages/session.php');

    function webRequest($rota, $acao)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => BASE_URL.$rota,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $acao,
            CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ZnJvbnRlbmR0b2tlbjphZG1pbg=='
            ),
        ));

        $result = curl_exec($curl);                                      
        curl_close($curl);
        $result = json_decode($result);

        return $result;
    }

?>