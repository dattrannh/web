<?php
$param = array(
    'name' => 'Danny',
    'address' => 'VN'
);
 
// URL có chứa hai thông tin name và diachi
$url = 'http://localhost/post.php';
 
// Khởi tạo CURL
$ch = curl_init($url);
 
// Thiết lập có return
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//thiet lap trinh duyen
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36');


// Thiết lập sử dụng POST
curl_setopt($ch, CURLOPT_POST, count($param));
 
// Thiết lập các dữ liệu gửi đi
curl_setopt($ch, CURLOPT_POSTFIELDS, $param); 

$result = curl_exec($ch);
 
curl_close($ch);
 
echo $result;

?>