<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //
    protected $table = 'artists';
    protected static $foreignColumn = "";

    protected $fillable = [
        'user',
        'name',
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
