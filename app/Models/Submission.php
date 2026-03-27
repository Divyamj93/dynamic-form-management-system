<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['form_id'];

    public function data()
    {
        return $this->hasMany(\App\Models\SubmissionData::class);
    }

}
