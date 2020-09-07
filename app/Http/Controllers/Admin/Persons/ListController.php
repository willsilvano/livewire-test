<?php

namespace App\Http\Controllers\Admin\Persons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        return view('admin.persons.list');
    }
}
