<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Warga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('nama','like', '%' . $search . '%');
                
            });
        });
    }

    //kasih ini biar route nya bisa baca data dari yang dikasih pas nge href
    public function getRouteKeyName()
    {
        return 'otoken';
    }
    
}

