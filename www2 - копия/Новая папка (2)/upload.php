<?php


$someText = $_FILES["filename"]["name"];
$d1 = mb_detect_encoding($someText);


//Проблема денвера
$someText = iconv("UTF-8", "windows-1251//TRANSLIT", $someText);

$cyrillicTxt=$someText;

$cyrillicPattern  = array('а','б','в','г','д','e', 'ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у', 
        'ф','х','ц','ч','ш','щ','ъ','ь', 'э', 'ы', 'ю','я','А','Б','В','Г','Д','Е', 'Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У',
        'Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ь', 'Э', 'Ы', 'Ю','Я' );

$latinPattern = array( 'a','b','v','g','d','e','jo','zh','z','i','y','k','l','m','n','o','p','r','s','t','u',
        'f' ,'h' ,'ts' ,'ch','sh' ,'sht', '', '`', 'je','ji','yu' ,'ya','A','B','V','G','D','E','Jo','Zh',
        'Z','I','Y','K','L','M','N','O','P','R','S','T','U',
        'F' ,'H' ,'Ts' ,'Ch','Sh','Sht', '', '`', 'Je' ,'Ji' ,'Yu' ,'Ya' );

//$someText = str_replace($cyrillicPattern, $latinPattern, $cyrillicTxt);












$d2 = mb_detect_encoding($someText);

    echo $_FILES["filename"]["name"].'<br />';
   if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает три мегабайта");
     exit;
   }
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["filename"]["tmp_name"], "path/to/file/".'ggg.П2ПП.ggg-'.$someText);
     echo $d1.'<br />'.$d2.'<br />'.$_FILES["filename"]["name"].' <br /> и <br />'.$someText;
   } else {
      echo("Ошибка загрузки файла");
   }
?>
</body>
</html>