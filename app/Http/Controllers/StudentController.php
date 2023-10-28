<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();

        $data = [
            "message" => "Get all student",
            "data" => $student
        ];

        //kirim data (json) dan response code 200
        return response()->json($data, 200);
    }

    //membuat method store
    public function store(Request $request)
    {
        //menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        //menggunakan model student untuk insert data
        $student = Student::create($input);

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

        //mengecek apakah ada student dengan id tersebut
        if (!$student) {
            $data = [
                'message' => 'Data tidak ditemukan',
            ];
            return response()->json($data, 404);
        }

        //menangkap data request
        $student->nama = $request->input('nama');
        $student->nim = $request->input('nim');
        $student->email = $request->input('email');
        $student->jurusan = $request->input('jurusan');
        $student->save();

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