<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormField;
use App\Models\Submission;
use App\Models\SubmissionData;
use App\Models\User;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = \App\Models\Form::all();

        return view('admin.forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view('admin.forms.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Save Form
    $form = Form::create([
    'title' => $request->title,
    'status' => 1
]);

// ✅ STEP 1: SAVE DEFAULT FIELDS
$defaultFields = [
    ['label' => 'name', 'type' => 'text'],
    ['label' => 'email', 'type' => 'email'],
    ['label' => 'phone', 'type' => 'number'],
];

foreach ($defaultFields as $df) {
    FormField::updateOrCreate([
        'form_id' => $form->id,
        'label' => $df['label'],
        'type' => $df['type'],
        'required' => 0,
    ]);
}

// ✅ STEP 2: SAVE CUSTOM FIELDS
foreach ($request->fields as $field) {

    if (empty($field['label'])) continue;

    FormField::updateOrCreate([
        'form_id' => $form->id,
        'label' => $field['label'],
        'type' => $field['type'],
        'required' => isset($field['required']) ? 1 : 0,
        'options' => isset($field['options']) ? json_encode(explode(',', $field['options'])) : null,
        'validation_rules' => $field['validation'] ?? null,
    ]);
}

return redirect('/admin/forms')->with('success', 'Form Saved Successfully');
    }

    public function showForm($id)
    {
        $form = \App\Models\Form::with('fields')->findOrFail($id);

        return view('form.show', compact('form'));
    }

    public function submitForm(Request $request, $id)
    {
        $form = \App\Models\Form::with('fields')->findOrFail($id);

        // ✅ Dynamic validation
        $rules = [];

        foreach ($form->fields as $field) {
            if ($field->validation_rules) {
                $rules[$field->label] = $field->validation_rules;
            }
        }

        $request->validate($rules);

        // ✅ Create submission
        $submission = Submission::create([
            'form_id' => $form->id
        ]);

        // ✅ Save each field value
        foreach ($request->except('_token') as $key => $value) {
            SubmissionData::create([
                'submission_id' => $submission->id,
                'field_label' => $key,
                'value' => is_array($value) ? implode(',', $value) : $value
            ]);
        }

        // return "Form Submitted & Saved Successfully";
        return redirect('/admin/forms')->with('success', 'Form Submitted & Saved Successfully');
    }

    public function dashboard()
{
    return view('admin.dashboard', [
        'totalForms' => Form::count(),
        'totalSubmissions' => Submission::count(),
        'totalUsers' => User::count()
    ]);
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
