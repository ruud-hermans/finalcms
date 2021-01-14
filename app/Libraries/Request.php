<?php

namespace App\Libraries;

class Request
{

    public static function uri()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public static function method()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            self::checkFormTokens();
        }

        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Check if request is an ajax request
     */
    public static function ajax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    /**
     * Compare form token with the one in the session
     */
    private static function checkFormTokens()
    {
        if (!isset($_SESSION['token']) || !isset($_POST['f_token'])) {
            die(View::render('errors/bad-token.view'));
        } else {
            if ($_SESSION['token'] != $_POST['f_token']) {
                if (!self::ajax()) {
                    die(View::render('errors/bad-tokens.view'));
                } else {
                    return json_encode([
                        'success' => false,
                        'message' => "Formulier verlopen, refresh en probeer opnieuw.",
                    ]);
                }
            }
        }
    }
    
}