<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {   
        $data['title'] = 'Welcome to ReelRecs';
        $data['heading'] = 'ReelRecs';
        $data['descriptor'] = 'Find your next favorite movie or TV show here!';
        return view('templates/header', $data)
        . view('pages/' . 'home')
        . view('templates/footer');
    }
}
