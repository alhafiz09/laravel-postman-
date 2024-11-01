<?php

    namespace App\Http\Controllers;

    use App\Models\Student;     
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller; 

    class StudentController extends Controller
    {
        // GET: /students - Mendapatkan semua data students
        public function index()
        {
            $students = Student::all();
            $data = [
                'message'=> 'get all student',
                'data' => $students
            ];
            return response ()->json($data, 200);
        }

        // POST: /students - Menambahkan data student
        public function store(Request $request)
        {
            $input = [
                'nama' => $request->nama,
                'nim' => $request->nim,
                'email' => $request->email,
                'jurusan' => $request->jurusan
            ];
            $student = Student::create($input);
            $data = [
                'message'=> 'berhasil',
                'data'=> $student
            ];
            return response()->json($data,200);
        }

        // PUT: /students/{id} - Mengubah data student berdasarkan ID
        public function update(Request $request, $id)
        {   
            $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);   
        }
    }
        // DELETE: /students/{id} - Menghapus data student berdasarkan ID
        public function destroy($id)
        {
            $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->delete();

        $data = [
            'message' => 'Student deleted successfully'
        ];
        return response()->json($data, 200);
        }
    }
