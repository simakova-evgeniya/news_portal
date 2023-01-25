<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use NewsTrait;

    public function index()
    {
        return view('categories.index', [
          'categories' =>  $this->getCategories(),
        ]);
    }

    public function show( int $id)
    {
        return view('categories.show', [
            'categories' =>  $this->getCategories(), 
        ]);
    }
}
