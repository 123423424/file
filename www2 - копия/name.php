<?php
//setlocale(LC_ALL, 'ru_RU.UTF-8');
$someText = $_POST['name'];
$someText = preg_replace('/[^ a-zA-Z0-9А-Яа-яЁё\._-]/iu', '', $someText); 
//$someText = preg_replace ("/[^a-zA-Zа-яА-Я0-9\._-]/","", $someText ); // очистить почту  числа 

    //Проблема денвера
    //$someText = iconv("UTF-8", "windows-1251//TRANSLIT", $someText);
    
    //Изменить символы
$cyrillicTxt=$someText;
$cyrillicPattern  = array('а','б','в','г','д','е', 'ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у', 
        'ф','х','ц','ч','ш','щ','ъ','ь', 'э', 'ы', 'ю','я','А','Б','В','Г','Д','Е', 'Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У',
        'Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ь', 'Э', 'Ы', 'Ю','Я' );
$latinPattern = array( 'a','b','v','g','d','e','jo','zh','z','i','y','k','l','m','n','o','p','r','s','t','u',
        'f' ,'h' ,'ts' ,'ch','sh' ,'sht', '', '`', 'je','ji','yu' ,'ya','A','B','V','G','D','E','Jo','Zh',
        'Z','I','Y','K','L','M','N','O','P','R','S','T','U',
        'F' ,'H' ,'Ts' ,'Ch','Sh','Sht', '', '`', 'Je' ,'Ji' ,'Yu' ,'Ya' );

$someText = str_replace($cyrillicPattern, $latinPattern, $cyrillicTxt);



echo $someText;
