<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $with = ['score'];
    protected $fillable = ['company_id', 'body', 'score_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function score()
    {
        return $this->belongsTo(Score::class);
    }
}
