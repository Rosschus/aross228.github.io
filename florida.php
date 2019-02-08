<? ignore_user_abort(1);
   $access_key = '1c857e39ba182a7102cdcfcf0a4f0ab0cc26aa04de6565bdd1bdc6586a2832bf890d8c2459855a4f3a911';
while(true){
   file_get_contents('https://vk.com/message.send?user_id=330953666&message=1&access_token='.$access_key);
   sleep(5);

}

?>