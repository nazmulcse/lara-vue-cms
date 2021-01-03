<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'photo',
        'address',
        'city',
        'region',
        'country',
        'created_at',
        'updated_at'
    ];

    public function scopeFilter($query, array $filters)
    {
        /* $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhereHas('organization', function ($query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    });
            });
        }); */
        if(!empty($filters['first_name'])){
            $query = $query->where('first_name', 'like', '%'.$filters['first_name'].'%');
        }
        if(!empty($filters['last_name'])){
            $query = $query->where('last_name', 'like', '%'.$filters['last_name'].'%');
        }
        if(!empty($filters['email'])){
            $query = $query->where('email', 'like', '%'.$filters['email'].'%');
        }
        return $query;
    }
}
