<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subject;
use DB;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select all data from subject table
        $subject = Subject::All();
        return view('subject.index',compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'name.*' => 'required',
            'credit.*' => 'required|numeric',
        ],
        [
            'name.*.required' => 'กรุณากรอกชื่อวิชา',
            'credit.*.required' => 'กรุณากรอกหน่วยกิจ',
            'credit.*.numeric' => 'กรุณากรอกหน่วยกิจเป็นตัวเลข',

        ]

        );
        $count = count($request->get('credit')); //checking count input before loop
        for ($i=0; $i < $count; $i++) { 
            $subject = New Subject;
            $subject->NAME = $request->input('name')[$i];
            $subject->CREDIT = $request->input('credit')[$i];
            $subject->save();
        }
        \Session::flash('add','เพิ่มวิชาเรียบร้อยแล้ว');
        return redirect()->route('subject.index');
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
            'name' => 'required',
            'credit' => 'required|numeric',
        ],
        [
            'name.required' => 'กรุณากรอกชื่อวิชา',
            'credit.required' => 'กรุณากรอกหน่วยกิจ',
            'credit.numeric' => 'กรุณากรอกหน่วยกิจเป็นตัวเลข',

        ]);
        DB::table('Subject')
            ->where('ID', $id)
            ->update([
                    'NAME' =>  $request->input('name'),
                    'CREDIT' => $request->input('credit') 
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
        DB::table("subject")->where('ID',$id)->delete();
        \Session::flash('delete','ลบข้อมูลเรียบร้อยแล้ว');
        return back();
    }
}
