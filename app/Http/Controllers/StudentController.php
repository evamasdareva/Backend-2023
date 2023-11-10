<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        //mendapatkan semua data student
        $student = Student::all();

        //jika data kosong maka kirim status code 204
        if($student->isEmpty()){
            $data = [
                "message" => "Resource is empty"
            ];

            return response()->json($data, 204);
        }

        $data = [
            "message" => "Get all student",
            "data" => $student
        ];

        //kirim data (json) dan response code 200
        return response()->json($data, 200);
    }

    public function show($id){
        $student = Student::find($id);

        // jika data yang dicari tidak ada, kirim kode 404
        if(!$student){
            $data = [
                "message" => "Data not found"
            ];

            return response()->json($data, 404);
        }

        $data = [
            "message" => "Show detail resource",
            "data" => $student
        ];

        //mengembalikan data dan status code 200
        return response()->json($data, 200);
    }

    //membuat method store
    public function store(Request $request)
    {
        // Membuat validasi
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required'
        ]);

        //menggunakan model student untuk insert data
        $student = Student::create($validatedData);

        $data = [
            'message' => "student is creates succesfully",
            'data' => $student,
        ];

        //mengembalikan data json dan kode 201
        return response()->json($data, 201);
    }

    public function update($id, Request $request)
    {
        //menangkap id dari parameter
        $student = Student::find($id);

        // jika data yang dicari tidak ada, kirim kode 404
        if(!$student){
            $data = [
                "message" => "Data not found"
            ];

            return response()->json($data, 404);
        }

        $student->update([
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
        ]);


        //menyimpan data yang telah diubah
        $student->save();

        $data = [
            'message' => 'Data berhasil Diubah',
            'data' => $student,
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        // Mencari data siswa berdasarkan ID
        $student = Student::find($id);

        // jika data yang dicari tidak ada, kirim kode 404
        if(!$student){
            $data = [
                "message" => "Data not found"
            ];

            return response()->json($data, 404);
        }

        // Mengecek apakah data tersebut ada atau tidak
        if (!$student) {
            $data = [
                'message' => 'Data tidak berhasil ditemukan',
            ];
            return response()->json($data, 404);
        }

        // Menghapus data siswa
        $student->delete();

        $data = [
            'message' => "Data berhasil dihapus",
        ];
        return response()->json($data, 203);
    }

}