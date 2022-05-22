<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
       // return view('crud.index',compact('students'));
       return response()->json($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
          'name' => 'required',
          'email' => 'required|email|unique:students,email',
          'password' => 'required|min:6',
          'phone' => 'required',
          'date_of_joining' => 'required|'
        ]);

        $studentRecord = Student::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'date_of_joining' => $request->date_of_joining
        ]);
      //  return redirect('/students')->with('message','Student Record Created Succesfully');
      return response()->json($studentRecord );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showStudentId = Student::findOrFail($id);
        if(!$showStudentId){
            return response()->json('Student Not Found');
        }

        return response()->json($showStudentId::find($id),201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editStudent = Student::findOrFail($id);
        return view('crud.edit',compact('editStudent'));
        

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
        $studentRecord = Student::findOrFail($id);

        if(is_null($studentRecord)){
            return response()->json('Student Not Found');
        }
        
        $studentRecord->update($request->all());


         
         // return redirect('/students')->with('message','Student Record Updated Successfully');
         return response()->json(['message' => 'Student Records Updated Successfuly',
                                'Updated Details' => $studentRecord
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentDelete = Student::findOrFail($id);
        $studentDelete->delete();
       // return redirect('/students')->with('message','Student Record Deleted Successfully');
       return response()->json(['message' => 'Student Records Deleted Successfuly',
                             'Deleted Details' => $studentDelete
        ]);
    }
}
