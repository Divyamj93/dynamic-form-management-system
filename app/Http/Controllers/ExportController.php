<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;

class ExportController extends Controller
{
    public function export()
{
    $data = Submission::with('data')->get();

    return response()->streamDownload(function () use ($data) {

        $handle = fopen('php://output', 'w');

        // Header
        fputcsv($handle, ['Submission ID','Field','Value']);

foreach ($data as $submission) {
    foreach ($submission->data as $item) {
        fputcsv($handle, [
            $submission->id,
            $item->field_label,
            $item->value
        ]);
    }
}

        fclose($handle);

    }, 'submissions.csv');
}
}
