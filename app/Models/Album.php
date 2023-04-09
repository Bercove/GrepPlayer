<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $table = 'albums';
    protected static $foreignColumn = "";

    protected $fillable = [
        'user',
        'name',
        'artist',
        'image',
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
