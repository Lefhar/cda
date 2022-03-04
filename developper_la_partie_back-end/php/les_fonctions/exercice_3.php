<?php
/**
 * @param string $password
 * @return bool
 */
function complex_password(string $password): bool
{
    if(preg_match("`^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,})$`",$password)){
        return true;
    }else{
        return false;
    }
}