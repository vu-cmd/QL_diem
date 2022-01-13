<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject as MainModel;

class SubjectController extends Controller {
    public function index() {
        $data['rows'] = MainModel::all();
        return view('subjects.index', $data);
    }
}