<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User as MainModel;

class StudentController extends Controller {
    public function index() {
        $data['rows'] = MainModel::where('role', 'student')->get();
        return view('students.index', $data);
    }
}