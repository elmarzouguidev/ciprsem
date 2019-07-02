<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
/****************************************************************************/
    public function scopeOnline($query,$online, $limit)
    {
        return $query->where('active',$online)
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get();
    }

    public function scopeOnlineWithPaginate($query,$Number)
    {
        return $query->where('active',true)
            ->simplePaginate($Number,['*'],'news');
    }

    public function scopeSingleArticle($query,$slug)
    {
        return $query->where('slug',$slug)->FirstOrFail();
    }

    public function scopeIncrementView($query,$slug)
    {

        return $query->where('slug', $slug)->increment('view_counter');

    }

    public function scopeArticleTranslatedInAllLanguages($query)
    {
        return $query->whereNotNull('title_fr')
            ->whereNotNull('body_fr')
            ->whereNotNull('title_en')
            ->whereNotNull('body_en')
            ->whereNotNull('title_ar')
            ->whereNotNull('body_ar')
            ->get();
    }

    public function scopeArticleNeedTrans($query)
    {
        return $query->whereNull('title_fr')
            ->whereNull('body_fr')
            ->whereNull('title_en')
            ->whereNull('body_en')
            ->whereNull('title_ar')
            ->whereNull('body_ar')
            ->OrwhereNull('title_fr')
            ->OrwhereNull('body_fr')
            ->OrwhereNull('title_en')
            ->OrwhereNull('body_en')
            ->OrwhereNull('title_ar')
            ->OrwhereNull('body_ar')
            ->get();
    }

    public function scopeCommentsForThisArticle($query,$slug)
    {
        return $query->where('slug',$slug)->firstOrFail();
    }


}
