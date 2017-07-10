<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $with = ['score'];
    protected $fillable = ['score_id', 'body'];
    public function score()
    {
        return $this->belongsTo(Score::class);
    }



}
