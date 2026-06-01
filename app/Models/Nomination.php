<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    protected $fillable = [
        'company_name',
        'contact_person',
        'designation',
        'email',
        'phone',
        'country',
        'industry_sector',
        'company_description',
        'website',
    ];
}
