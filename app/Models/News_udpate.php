<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News_udpate extends Model
{
    use HasFactory;
    protected $table = 'news_udpates';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description'
    ];
}
