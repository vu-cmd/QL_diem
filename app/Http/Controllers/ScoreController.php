<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score as MainModel;
use App\Models\Subject;
use App\Models\User;
use App\Models\Classroom;

class ScoreController extends Controller
{
    public function viewSubjects()
    {
        $data['rows'] = Subject::all();
        return view('scores.subject.list', $data);
    }

    public function bySubject(Request $request, $id)
    {
        $data['rows'] = MainModel::where('subject_id', $id)->get();
        $data['rec'] = MainModel::findOrFail($id);
        return view('scores.subject.index', $data);
    }

    public function viewStudents()
    {
        $data['rows'] = User::where('role', 'student')->get();
        return view('scores.student.list', $data);
    }

    public function byStudent(Request $request, $id)
    {
        $data['rows'] = MainModel::where('student_id', $id)->get();
        $data['rec'] = User::findOrFail($id);
        return view('scores.student.index', $data);
    }

    public function viewSemesters()
    {
        $data['rows'] = Subject::select('semester')->distinct()->orderBy('semester', 'DESC')->get();
        return view('scores.semester.list', $data);
    }

    public function bySemester(Request $request, $semester)
    {
        $data['rec'] = $semester;
        $data['rows'] = MainModel::all();
        $data['rows_filtered'] = [];
        foreach ($data['rows'] as $row) {
            if ($row->subject->semester == $semester) {
                array_push($data['rows_filtered'], $row);
            }
        }
        $data['rows'] = $data['rows_filtered'];
        return view('scores.semester.index', $data);
    }

    public function viewClassrooms()
    {
        $data['rows'] = Classroom::all();
        return view('scores.classroom.list', $data);
    }

    public function byClassroom(Request $request, $id)
    {
        $data['rec'] = Classroom::findOrFail($id);
        $data['rows'] = MainModel::all();
        $data['rows_filtered'] = [];
        foreach ($data['rows'] as $row) {
            if ($row->student->class->id == $id) {
                array_push($data['rows_filtered'], $row);
            }
        }
        $data['rows'] = $data['rows_filtered'];
        return view('scores.classroom.index', $data);
    }
}
