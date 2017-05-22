<?php

class User extends Model {

    public function getName() {
        return 'customer';
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет телефон: не меньше, чем 10 символов
     */
    public static function checkPhone($phone)
    {
        $patern = "/^[+()0-9 ]{10,22}$/";

        if (preg_match($patern, $phone) && strlen($phone) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет пароль: не меньше, чем 6 символов
     */
    public static function checkPassword($password) {
        $patern = '/^[0-9]+[a-z,A-Z]+$/';
        if (preg_match($patern, $password) && strlen($password) >= 8) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     */
    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function passwordConfirm($password, $p) {
        if ($password == $p) {
            return true;
        }
        return false;

    }
}