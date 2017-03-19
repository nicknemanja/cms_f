<?php

class UserController {

    static function getList() {
        
    }

    static function isLoggedIn() {
        if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
            return false;
        }
        return (($_SESSION['isLoggedIn'] === true) && ($_SESSION['isAdmin'] === true));
    }

    static function login($username = '', $password = '') {

        file_put_contents("login.txt", $username . ',' . $password);

        if (User::isLoggedIn()) {
            render('index');
            die();
        }

        if (UserController::empty_parameters($username, $password)) {
            render('login');
            die();
        }

        if (User::login($username, $password)) {
            //LOGGED IN
            file_put_contents("uspjesan login.txt", $username . ',' . $password);
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['isAdmin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user'] = User::getByUsername($username);
            $_SESSION['LOGIN_SUCCESS'] = "Uspjesno ste logovani.";

            if (isset($_SESSION['REQUESTED_PAGE'])) {
                //Korisnik je zahtjevao neku stranicu, ali je preusmjeren na login.
                //Nakon uspjesnog logina, bice vracen na zahtjevanu stranicu.
                $requestedPage = $_SESSION['REQUESTED_PAGE'];
                unset($_SESSION['REQUESTED_PAGE']);
                render($requestedPage);
                die();
            } else {
                render('index');
                die();
            }
        } else {
            //LOGIN FAIL
            file_put_contents("neuspjesan login.txt", $username . ',' . $password);
            $_SESSION['isLoggedIn'] = false;
            $_SESSION['isAdmin'] = false;
            file_put_contents("prije postavljanja LOGIN_FAIL.txt", $username . ',' . $password);
            $_SESSION['LOGIN_FAIL'] = "Korisnicko ime i lozinka nisu tacni. Pokusajte ponovo.";
            file_put_contents("Nakon postavljanja LOGIN_FAIL.txt", $username . ',' . $password);
            render('login');
            die();
        }
    }

    static function logout() {
        $_SESSION['isLoggedIn'] = false;
        unset($_SESSION['username']);
        unset($_SESSION['user']);
        $_SESSION['LOGOUT_SUCCESS'] = "Uspjesno ste se izlogovali.";
        render('login');
    }

    static function showUsers() {
        if (!User::isLoggedIn()) {
            $_SESSION['REQUESTED_PAGE'] = 'users';
            $_SESSION['MUST_BE_LOGGED_IN'] = 'Morate biti logovani za pristup ';
            render('login');
        } else {
            render('users');
        }
    }

    static function empty_parameters($username, $password) {
        return ( (is_null($username) || is_null($password) || strlen($username) === 0 || strlen($password) === 0 ));
    }

}
