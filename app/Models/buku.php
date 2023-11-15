<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class buku extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'title', 'ready', 'categori', 'cover', 'published_year'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);

    }
}
