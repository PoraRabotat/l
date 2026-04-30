<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['number', 'text','status_id', 'user_id']; // понадобится для Create/Update

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

