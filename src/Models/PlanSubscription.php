<?php

namespace Vanthao03596\LaravelSubscriptions\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class PlanSubscription extends Model
{
    use Sluggable;

    protected $table = 'plan_subscriptions';

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
}
