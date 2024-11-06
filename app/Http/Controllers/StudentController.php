<?php

    namespace App\Http\Controllers;

    use App\Models\Student;     
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller; 

    class StudentController extends Controller
    {
        public function index()
        {
            $students = Student::all();
           return response()->json($students);
        }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'nim' => 'required|naumber',
                'email' => 'required|email|unique:students',
                'jurusan' => 'required|string',
            ]);
        
            $student = Student::create($validatedData);
            return response()->json($student, 201);
        }
        

        public function update(Request $request, $id)
        {   
            $student = Student::find($id);
            if($student){
                $student->name = $request->name;
                $student->email = $request->email;
                $student->nim = $request->nim;
                $student->jurusan = $request->jurusan;
                $student->save();
                $data = [
                    'message' => 'Data berhasil diubah',
                    'data' => $student];
        } 
        
        else {
            $data = [
                'message'=> 'Tidak menemukan data yang dimaksud',
            ];
            return response()->json($data, 404);
            }
        }
        public function destroy($id)
        {
            $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Data terhapus'], 404);
        }

        $student->delete();

        $data = [
            'message' => 'Data gagal terhapus'
        ];
        return response()->json($data, 200);
        }

        public function show($request, $id)
        {
            {
                $student = Student::find($id);
                if (!$student) {
                    return response()->json(['message' => 'Get detail data',
                'data' =>'$student']);
                }
                return response()->json($student);
            }
        }
    }
