<?php
$json_data = file_get_contents('php://input');
    
            $data = json_decode($json_data);
            $email = $data->identification; // �滻��Ҫ���͵������ַ���
            $pw = $data->password; // �滻��Ҫ���͵������ַ���
            $url = "https://service-dq726wx5-1302921490.sh.apigw.tencentcs.com/user/vp?email=$email&pw=$pw&p=eud93jcnal08byqp14oc7";

            // ����һ��CURL���
            $curl = curl_init($url);

            // ����ѡ�����URL
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // ����SSL֤��У��

            // ִ�в���ȡ��Ӧ���
            $response = curl_exec($curl);

            // �ر�CURL���
            curl_close($curl);
$valid=0;
            // �����Ӧ�Ƿ�Ϊ1
            if ($response == "1") {
                $valid=1;
            } 
echo $valid;
?>