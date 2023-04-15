<?php
$json_data = file_get_contents('php://input');
    
            $data = json_decode($json_data);
            $email = $data->identification; // 替换成要发送的邮箱字符串
            $pw = $data->password; // 替换成要发送的密码字符串
            $url = "https://service-dq726wx5-1302921490.sh.apigw.tencentcs.com/user/vp?email=$email&pw=$pw&p=eud93jcnal08byqp14oc7";

            // 创建一个CURL句柄
            $curl = curl_init($url);

            // 设置选项，包括URL
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 忽略SSL证书校验

            // 执行并获取响应结果
            $response = curl_exec($curl);

            // 关闭CURL句柄
            curl_close($curl);
$valid=0;
            // 检查响应是否为1
            if ($response == "1") {
                $valid=1;
            } 
echo $valid;
?>