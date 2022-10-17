<?php
  
namespace App\Http\Controllers;
  
use App\Models\Student;
use Illuminate\Http\Request;
  
class StudentController extends Controller
{

    public function index()
    {
        $students = Student::latest()->paginate(5);
      
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        return view('students.create');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required'
        ]);
      
        Student::create($request->all());
       
        return redirect()->route('students.index')
                        ->with('success','Student created successfully.');
    }
  
    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }
  
    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'id_pelanggan' ,
            'nama_pelanggan' ,
            'no_telepon', 
            'alamat',
            'no_ktp'
        ]);
      
        $student->update($request->all());
      
        return redirect()->route('students.index')
                        ->with('success','Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
       
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }
}