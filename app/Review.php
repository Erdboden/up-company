<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class);
    }
}
