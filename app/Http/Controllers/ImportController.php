<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index()
    {
        return view('admin.import.index');
    }

    public function store(Request $request)
    {
        $file = fopen($request->file('csv'), 'r');

        $validRows = [];
        $invalidRows = [];
        fgetcsv($file); // skip header row
        while (($data = fgetcsv($file)) !== false) {

            // Skip empty rows
            if (count($data) < 2) {
                continue;
            }

            $name = $data[0];
            $email = $data[1];

            if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $invalidRows[] = $data;
            } else {
                $validRows[] = $data;
            }
        }

        return view('admin.import.preview', compact('validRows', 'invalidRows'));
    }
}
