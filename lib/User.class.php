<?php

class User
{

    public static function exists($username)
    {
        $availableUsers = array('tsia', 'der_Hutt');
        if (in_array($username, $availableUsers)) {
            return true;
        }

        return false;
    }
}