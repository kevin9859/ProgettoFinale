<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'image',
        'user_id',
        'category_id',
        'is_accepted',
        'slug',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function toSearchableArray(){
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category->name,
        ];
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //public function getRouteKeyName() {
      //  return 'slug';    }

   

    
    public function readDuration()
    {
        // Calcolo della durata di lettura in base al numero di parole
        $totalWords = str_word_count($this->body);
        $minuteToRead = round($totalWords / 200); // Assume 200 parole al minuto come velocità di lettura media
        return intval($minuteToRead);
    }
}
