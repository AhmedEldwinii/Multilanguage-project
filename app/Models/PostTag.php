<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'post_id', 'tag_id', 'created_at', 'updated_at', 'deleted_at'];
}
