<?php

// A list of permitted file extensions Проверка
/*$allowed = array('png', 'jpg', 'gif','zip');
if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
    
  */  
   /* 
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
*/

echo '{"status":"error"}';

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
    
    //�������� �������
    $someText = iconv("UTF-8", "windows-1251//TRANSLIT", $_FILES['upl']['name']);
    
    //�������� �������
    $cyrillicTxt=$someText;
$cyrillicPattern  = array('�','�','�','�','�','e', '�','�','�','�','�','�','�','�','�','�','�','�','�','�','�', 
        '�','�','�','�','�','�','�','�', '�', '�', '�','�','�','�','�','�','�','�', '�','�','�','�','�','�','�','�','�','�','�','�','�','�','�',
        '�','�','�','�','�','�','�','�', '�', '�', '�','�' );
$latinPattern = array( 'a','b','v','g','d','e','jo','zh','z','i','y','k','l','m','n','o','p','r','s','t','u',
        'f' ,'h' ,'ts' ,'ch','sh' ,'sht', '', '`', 'je','ji','yu' ,'ya','A','B','V','G','D','E','Jo','Zh',
        'Z','I','Y','K','L','M','N','O','P','R','S','T','U',
        'F' ,'H' ,'Ts' ,'Ch','Sh','Sht', '', '`', 'Je' ,'Ji' ,'Yu' ,'Ya' );

$someText = str_replace($cyrillicPattern, $latinPattern, $cyrillicTxt);

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$someText)){
		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;
