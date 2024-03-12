<?php

namespace Modules\Note\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoteRelationship extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Note\Database\factories\NoteRelationshipFactory::new();
    }
}
