<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Student;
use App\GRADE;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade = Grade::All();
    	$student = DB::table('STUDENT')
                    ->leftJoin('SUBJECT', 'STUDENT.ID_S', '=', 'SUBJECT.ID')
                    ->orderBy('STUDENT.SEMESTER','ASC')
                    ->get();
        $student2 = DB::table('STUDENT')
                    ->leftJoin('SUBJECT', 'STUDENT.ID_S', '=', 'SUBJECT.ID')
                    ->where('GRADE',NULL)
                    ->get();
        // semester1
        $semester1 = DB::table('STUDENT')
                    ->leftJoin('SUBJECT', 'STUDENT.ID_S', '=', 'SUBJECT.ID')
                    ->where('SEMESTER',1)
                    ->get();
        $s1_gpa = DB::table('v_semester1_total_credit')->first();
        $s1_gpa2 = DB::table('v_semester1_all_credit')->first();

         // semester2
         
        $semester2 = DB::table('STUDENT')
                    ->leftJoin('SUBJECT', 'STUDENT.ID_S', '=', 'SUBJECT.ID')
                    ->where('SEMESTER',2)
                    ->get();
        $s2_gpa = DB::table('v_semester2_total_credit')->first();
        $s2_gpa2 = DB::table('v_semester2_all_credit')->first();
         // total GPA
        $gpa = DB::table('v_total_credit')->first();
        $gpa2 = DB::table('v_all_credit')->first();

    	return view('student/index',compact('student','student2','grade','gpa','gpa2','semester1','semester2','s1_gpa','s1_gpa2','s2_gpa','s2_gpa2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = Subject::All();
        $grade = Grade::All();
        return view('student.create',compact('subject','grade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [    
            'id_s' => 'required',
            'semester' => 'required'
        ],
        [
            'id_s.required' => 'กรุณาเลือกชื่อวิชา',
            'semester.required' => 'กรุณาเลือกเทอม'

        ]);
        $count = count($request->get('id_s')); //checking count input before loop
        for ($i=0; $i < $count; $i++) { 
            $student = New Student;
            $student->ID_S = $request->input('id_s')[$i];
            $student->GRADE = $request->input('grade')[$i];
            $student->SEMESTER =$request->input('semester');
            $student->save();
        }
        \Session::flash('add','เพิ่มวิชาเรียบร้อยแล้ว');
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'grade' => 'required',
        ],
        [
            'grade.required' => 'กรุณากรอกเกรด',

        ]);
        DB::table('STUDENT')
            ->where('SID', $id)
            ->update([
                    'GRADE' =>  $request->input('grade')
                    ]);
       \Session::flash('update','แก้ไขข้อมูลเรียบร้อยแล้ว');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table("student")->where('SID',$id)->delete();
        \Session::flash('delete','ลบข้อมูลเรียบร้อยแล้ว');
        return back();
    }
}
