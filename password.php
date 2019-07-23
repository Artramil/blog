<?php
const soult="qwerty dvcde";
function Password ($password){
    return sha1(soult.$password.soult);
}
?>