<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentsMark extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students_mark';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'term',
        'maths',
        'science',
        'history',
        'total_marks',
    ];

    /**
     * Inverse one-to-one relationship.
     */
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id', 'id');
    }
}
