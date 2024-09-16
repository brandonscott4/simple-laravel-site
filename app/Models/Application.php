<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['job_title', 'company', 'location', 'link', 'status', 'date_applied', 'note', 'user_id'];
}
