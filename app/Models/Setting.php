<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use PSpell\Config;

class Setting extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name', 'content', 'address'];
    protected $fillable = ['id', 'phone', 'email', 'logo', 'favicon', 'facebook', 'twitter', 'youtube', 'created_at', 'updated_at', 'deleted_at'];








    public static function checkSetting()
    {
        $setting = self::all();
        if ( count($setting)< 1){
            $data = [
                'id' => 1,
            ];
            foreach(Config('app.languages') as $key => $value ){
                $data[$key]['name'] = $value;
            };
            self::create($data);
        };
        return self::first();
    }
}
