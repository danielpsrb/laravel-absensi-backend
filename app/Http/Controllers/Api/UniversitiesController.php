<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class UniversitiesController extends Controller
{
    public function index()
    {
        $universite = University::find(1);
        return response(['universities' => $universite], 200);
    }
}
