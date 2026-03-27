<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionData extends Model
{
    protected $fillable = [
    'submission_id',
    'field_label',
    'value'
    ];
}
