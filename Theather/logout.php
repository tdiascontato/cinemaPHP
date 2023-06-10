<?php
  require_once("templates/header.php");
  //Usuario está logado?
  if($userDao) {
    $userDao->destroyToken();
}