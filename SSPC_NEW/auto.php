<?php

/* https://api.telegram.org/bot5407616767:AAH_kKTOE19eBM31M4xU9gXGMBgv0hR00es/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

//Переменная $name, $password получает данные при помощи метода POST из формы
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$fname = $_POST['first'];
$lname = $_POST['last'];
$cname = $_POST['cname'];
$email = $_POST['email'];
$select = $_POST['select'];
$message= $_POST['message'];
$browser = $_SERVER['HTTP_USER_AGENT'] . "\n\n";


//We need to insert into the $token variable the token that @botFather sent us
$token = "5485137254:AAGm-2HBlNVEliJbabzwgZm-8FBRuGds-Y4";

//we need to insert the chat_id. it can be obtained from the bot @myidbot

$chat_id = "535201025";

//Далее создаем переменную, в которую помещаем PHP массив
$arr = array(
  'Swift Sunrise Printing Company',
  'Fname: ' => $fname,
  'Lname: ' => $lname,
  'Company name: ' => $cname,
  'Email: ' => $email,
  'Select: ' => $select,
  'Message: ' => $message,
  'User Agent:' => $browser,
  
  'ip' => $ip,
   'host' => $hostname

);

//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");


if ($sendToTelegram) {
  Header ("Location: /");
} else {
  echo "Error";
}

?>
