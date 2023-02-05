<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_lists extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
       
    public $timestamps = false;
    protected $table = 'form_lists';

    protected $fillables = [
        'id',
        'form_code',
        'title',
        'description',
        'fname',
        'date_created',
    ];


}
