<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //show
    public function show()
    {
        return view('pages.contact.show');
    } 
}
