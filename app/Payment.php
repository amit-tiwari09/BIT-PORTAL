<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['student_id', 'fee_structure_id', 'amount', 'payment_date', 'transaction_id','semester'];

    public function feeStructure()
    {
        return $this->belongsTo(FeeStructure::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
