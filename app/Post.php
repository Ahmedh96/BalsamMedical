<?php

namespace App;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Post extends Model implements Feedable
{
    use Translatable;

    public $translatedAttributes = ['title' , 'description'];

    protected $fillable = [
        'image' , 'meta_keywords' , 'meta_description' ,
        'user_id' , 'category_id'
    ];

    public function user()

    {

        return $this->belongsTo('App\User' , 'user_id');

    }

    public function category()

    {

        return $this->belongsTo('App\Category' , 'category_id');

    }

    public function comments()

    {

        return $this->hasMany(Comment::class)->whereNull('parent_id');

    }


    // Start Generate Rss
    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->description)
            ->updated($this->updated_at)
            ->link(route('front.post' , [$this->id , str_replace_me($this->title)]))
            ->author("Balsam");
    }

    public static function getFeedItems()
    {
       return Post::all();
    }
    // End Generate Rss

}
