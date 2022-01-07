<?php
class DataValidationUtils {

    function checkEmailValid($email) {
        $pattern_email = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
        return (!preg_match($pattern_email, $email)) ? FALSE : TRUE;
    }

    function checkPasswordValid($pass) {
        $pattern = "/^[a-zA-Z-0-9' ]*$/";
        return (!preg_match($pattern, $pass)) ? FALSE : TRUE;
    }

}