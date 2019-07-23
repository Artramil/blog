<?php
const soult="qwerty dvcde";
function Password ($password){
    return sha1(soult.$password.soult);
}

function Autorization($login){
    // session_start();
    $_SESSION["Autorization"]=TRUE;
    $_SESSION["login"]=$login;
}
?>