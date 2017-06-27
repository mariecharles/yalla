<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content' , 'img', 'category_id', 'seo_id', 'lang', 'resume', 'meta_description'];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag');
    }

    // RECUPERER LES NOUVEAUX TAGS

    public function saveTags(string $tags)
    {
        $tags = array_map(function ($item) {

            return trim($item); ;

            } , explode(' ', $tags));


        $persisted_tags = Tag::whereIn('name', $tags)->get();

        $tags_to_create = array_diff($tags, $persisted_tags->pluck('name')->all());

        $tags_to_create = array_map(function ($tag) {

            return ['name' => $tag];

            }, $tags_to_create);


        $created_tags = $this->tag()->createMany($tags_to_create);

        $persisted_tags = $persisted_tags->merge($created_tags);

        $this->tag()->sync($persisted_tags);


    }

}
