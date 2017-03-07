<?php
$login='https://accounts.google.com/ServiceLogin';

function upload_file($key){
	 if (!empty($_FILES[$key]) && $_FILES[$key]['error'] <= 0)
    {
        if (move_uploaded_file($_FILES[$key]['tmp_name'], './'.$_FILES[$key]['name']))
        {
            return './'.$_FILES[$key]['name'];
        }
    }
    return false;
}


function login_google(){
	 $data = array(
        'accountType'   => 'GOOGLE',  
        'Email'         => 'giacmovutqua@gmail.com',  // Email của bạn
        'Passwd'        => '12345dat',             // Mật khẩu của bạn
        'source'        => __FILE__,  
        'service'       =>'lh2'
    ); 
 
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/accounts/ClientLogin");  
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  
    curl_setopt($ch, CURLOPT_POST, true);  
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1" );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
    $hasil = curl_exec($ch);  
 
    // Kiểm tra kết quả thành công hay thất bại
    // Nếu thành công thì google sẽ trả về đoạn mã có định dạng
    // Auth=key, nên ta lấy key bằng cách sử dụng hàm preg_match
    if (preg_match('#Auth=([a-z0-9_\-]+)#i', $hasil, $match)) 
    {
        return $match[1];
    }
    return false;
	
}
$key = login_google();
 
    // Kiểm tra key login
    if (!$key){
        echo 'Không thể đăng nhập vào tài khoản Google';
    }else{
		echo 'error';
	}

?>