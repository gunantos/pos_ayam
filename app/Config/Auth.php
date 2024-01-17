<?php

class Auth extends \Myth\Auth\Config\Auth
{
    
    public $viewLayout = 'Views\layout_auth';
    public $views = [
        'login'       => 'Myth\Auth\Views\login',
        'register'    => 'Myth\Auth\Views\register',
        'forgot'      => 'Myth\Auth\Views\forgot',
        'reset'       => 'Myth\Auth\Views\reset',
        'emailForgot' => 'Myth\Auth\Views\emails\forgot',
    ];
    public $allowRegistration = false;
    public $hashAlgorithm = PASSWORD_DEFAULT;
     public $authenticationLibs = [
        'local' => 'Myth\Auth\Authentication\LocalAuthenticator',
    ];
}