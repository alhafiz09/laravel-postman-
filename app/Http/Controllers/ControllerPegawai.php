<?php

    namespace App\Http\Controllers;

    use App\Models\Student;     
    use Illuminate\Http\Request;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Routing\Controller;
    use Laravel\Sanctum\HasApiTokens;

    class PegawaiController extends Controller
    {
        public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawai,email,' . $id,
            'telepon' => 'required|string|max:15',
        ]);

        // Mencari pegawai berdasarkan ID
        $pegawai = Pegawai::find($id);

        // Cek apakah pegawai ditemukan
        if (!$pegawai) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pegawai not found',
            ], 404);
        }

        // Update data pegawai
        $pegawai->update($validated);

        // Mengembalikan response dalam format JSON
        return response()->json([
            'status' => 'success',
            'message' => 'Pegawai updated successfully',
            'data' => $pegawai
        ], 200);
    }
    }   
                