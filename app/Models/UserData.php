<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    //
    protected $table = "user_data";
    protected static $foreignColumn = "";

    protected $fillable = [
        'id',
        'user',
        'firstname',
        'middlename',
        'lastname',
        'bd',
        'gender',
        'age',
        'tel',
        'country',
        'about'
    ];

    /**
     * Public function that returns the table name
     * @access ModelName::Table() 
     * @example EventImages::Table()
     * @return $this->table
     */
    public function scopeTable()
    {
        return $this->table;
    }
}
