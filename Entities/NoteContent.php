<?php

namespace Modules\Note\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoteContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'text',
    ];


    protected $primaryKey = 'cid';

    protected static function newFactory()
    {
        return \Modules\Note\Database\factories\NoteContentFactory::new();
    }
}
