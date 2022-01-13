<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom as MainModel;

class ClassroomController extends Controller {
    public function index() {
        $data['rows'] = MainModel::all();
        return view('classes.index', $data);
    }
}