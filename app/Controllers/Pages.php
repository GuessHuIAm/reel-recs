<?php
namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    private $page_dictionary = array(
        'home' => ['ReelRecs', 'Find your next favorite movie or TV show here!'],
        'categories' => ['Categories', 'Browse movies and TV shows by category.'],
        'people' => ['People', 'Browse movies and TV shows by the cast and crew.'],
        'recs' => ['Recommendations', "We'll recommend movies and TV shows based on your preferences!"],
        'about' => ['About', 'Learn more about ReelRecs.'],
        'contact' => ['Contact', 'Contact the ReelRecs team.'],
        'login' => ['Login', 'Login to your ReelRecs account.'],
        'signup' => ['Sign Up', 'Create a ReelRecs account.'],
        'profile' => ['Profile', 'View your ReelRecs profile.'],
        'shows' => ['Shows', 'Browse all TV shows.'],
        'movies' => ['Movies', 'Browse all movies.'],
    );
    public function index()
    {
       return $this->view('home');
    }

    public function view($page = 'home')
    {
       if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
          // Whoops, we don't have a page for that!
          throw new PageNotFoundException($page);
       }

       $data['title'] = ucfirst($page); // Capitalize the first letter
       $data['heading'] = $this->page_dictionary[$page][0];
       $data['descriptor'] = $this->page_dictionary[$page][1];

       return view('templates/header', $data)
          . view('pages/' . $page)
          . view('templates/footer');
    }
}