<?php

class UserController {

    static function isLoggedIn() {
        if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
            return false;
        }
        return (($_SESSION['isLoggedIn'] === true) && ($_SESSION['isAdmin'] === true));
    }

    static function login($username = '', $password = '') {

        if (User::isLoggedIn()) {
            render('index');
        }

        if (is_null($username) || is_null($password) || strlen($username) === 0 || strlen($password) === 0) {
            render('login');
        } else {
            if (User::login($username, $password)) {
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['isAdmin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['user'] = User::getByUsername($username);
                $_SESSION['LOGIN_SUCCESS'] = "Uspjesno ste logovani.";
                render('index');
            } else {
                $_SESSION['isLoggedIn'] = false;
                $_SESSION['isAdmin'] = false;
                $_SESSION['LOGIN_FAIL'] = "Korisnicko ime i lozinka nisu tacni. Pokusajte ponovo.";
                render('login');
            }
        }
    }

    static function logout() {
        $_SESSION['isLoggedIn'] = false;
        unset($_SESSION['username']);
        unset($_SESSION['user']);
        $_SESSION['LOGOUT_SUCCESS'] = "Uspjesno ste se izlogovali.";
        render('login');
    }
    
    static function showUsers(){
        render('users');
    }

}
