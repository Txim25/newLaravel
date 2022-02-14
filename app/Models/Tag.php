<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='Tags';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey='id';
    // const CREATED_AT='data_creacio';
    // const UPDATED_AT='data_actualitzacio';
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'userId',
        'name',
        'enlace',
        'imagen',
        'categoria',
        'posicion'
        
    ];

}
