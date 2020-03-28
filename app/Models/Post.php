<?php

namespace App\Models;

use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    /**
     * 索引名称
     * @return string
     */
    public function searchableAs()
    {
        return "topic.index";
    }

    /**
     * 可搜索的数据索引
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
//            'body' => $this->body,
            'excerpt' => $this->excerpt,
            'slug' => $this->slug,
        ];
    }

    protected $fillable = ['title', 'body', 'category_id', 'excerpt', 'slug'];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeWithOrder($query, $order)
    {
        // 不同的排序，使用不同的数据读取逻辑
        switch ($order) {
            case 'recent':
                $query = $this->recent();
                break;

            default:
                $query = $this->recentReplied();
                break;
        }
        // 预加载防止 N+1 问题
        return $query->with('user', 'category');
    }

    public function scopeRecentReplied($query)
    {
        // 当话题有新回复时，我们将编写逻辑来更新话题模型的 reply_count 属性，
        // 此时会自动触发框架对数据模型 updated_at 时间戳的更新
        return $query->orderBy('updated_at', 'desc');
    }

    public function scopeRecent($query)
    {
        // 按照创建时间排序
        return $query->orderBy('created_at', 'desc');
    }

    public function link($params = [])
    {
        return route('topics.show', array_merge([$this->id, $this->slug], $params));
    }
}