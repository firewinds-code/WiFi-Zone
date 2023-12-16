<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackerModels extends Model
{
    use HasFactory;

    protected $fillable = ['ip', 'date','zone'];
    protected $table = 'visitors';

    public static function boot()
    {
        self::saving(function ($tracker) {
            $tracker->visit_time = date('H:i:s');
            $tracker->hits++;
        });
    }

    public static function hit()
    {
        self::firstOrCreate(['ip' => '1']);
    }
}