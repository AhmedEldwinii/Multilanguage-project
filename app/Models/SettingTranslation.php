<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id', 'locale', 'name', 'content', 'address', 'setting_id'];
}
