<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="todos";

    protected $fillable = [
        'id',
        'content',
        'completed',
    ];

    protected $casts = [
        'completed'=>'boolean'
    ];

    public $timestamps = false;
    /**
     * @var mixed
     */


    protected function content(): Attribute
    {
        return Attribute::get(function ($value) {
                return ucwords($value);
            });
    }
}
