<?php

namespace Vanthao03596\LaravelSubscriptions\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use Sluggable;

    protected $table = 'plans';

    protected $guarded = ['id'];

    protected $casts = [
        'is_active' => 'bool',
    ];

    public function features(): HasMany
    {
        return $this->hasMany(config('laravel-subscriptions.models.plan_feature'), 'plan_id', 'id');
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(config('laravel-subscriptions.models.plan_subscription'), 'plan_id', 'id');
    }

    public function isFree(): bool
    {
        return (float) $this->price <= 0.00;
    }

    public function hasTrial(): bool
    {
        return $this->trial_period && $this->trial_interval;
    }

    public function hasGrace(): bool
    {
        return $this->grace_period && $this->grace_interval;
    }

    public function getFeatureBySlug(string $featureSlug): ?PlanFeature
    {
        return $this->features()->where('slug', $featureSlug)->first();
    }

    /**
     * Activate the plan.
     *
     * @return $this
     */
    public function activate()
    {
        $this->update(['is_active' => true]);

        return $this;
    }

    public function deactivate()
    {
        $this->update(['is_active' => false]);

        return $this;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
}
