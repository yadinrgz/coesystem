<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'ticket_id',
        'name',
        'email',
        'category',
        'subject',
        'status',
        'esfera_izq',
        'esfera_der',
        'cilindro_izq',
        'cilindro_der',
        'eje_izq',
        'eje_der',
        'adicion_izq',
        'adicion_der',
        'dnp_izq',
        'dnp_der',
        'altura_izq',
        'altura_der',
        'description',
        'attachments',
        'note',
    ];

    public function conversions()
    {
        return $this->hasMany('App\Models\Conversion', 'ticket_id', 'id')->orderBy('id');
    }

    public function tcategory()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category');
    }

    public static function category($category)
    {
        $categoryArr  = explode(',', $category);
        $unitRate = 0;
        foreach ($categoryArr as $username) {
            $category     = Category::find($category);
            $unitRate     = $category->name;
        }
        // dd($category);

        return $unitRate;
    }
}
