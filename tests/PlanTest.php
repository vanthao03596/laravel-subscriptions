<?php

namespace Vanthao03596\LaravelSubscriptions\Tests;

use Vanthao03596\LaravelSubscriptions\Models\Plan;
use Vanthao03596\LaravelSubscriptions\Models\PlanFeature;
use Vanthao03596\LaravelSubscriptions\Models\PlanSubscription;

class PlanTest extends TestCase
{
    /** @test */
    public function is_has_many_features()
    {
        $plan = factory(Plan::class)->create();

        factory(PlanFeature::class)->create(['plan_id' => $plan->id]);
        factory(PlanFeature::class)->create(['plan_id' => $plan->id]);

        $this->assertInstanceOf(PlanFeature::class, $plan->features()->first());
        $this->assertCount(2, $plan->features);
    }

    /** @test */
    public function is_has_many_subscriptions()
    {
        $plan = factory(Plan::class)->create();

        factory(PlanSubscription::class)->create(['plan_id' => $plan->id, 'user_type' => User::class, 'user_id' => 1]);
        factory(PlanSubscription::class)->create(['plan_id' => $plan->id, 'user_type' => User::class, 'user_id' => 1]);

        $this->assertInstanceOf(PlanSubscription::class, $plan->subscriptions()->first());
        $this->assertCount(2, $plan->subscriptions);
    }

    /** @test */
    public function is_can_check_is_free()
    {
        $plan = factory(Plan::class)->create(['price' => '0.00']);
        $this->assertTrue($plan->isFree());
    }

    /** @test */
    public function is_can_check_has_trial()
    {
        $trialPlan = factory(Plan::class)->create(['trial_period' => '1', 'trial_interval' => 'day']);
        $normalPlan = factory(Plan::class)->create(['trial_period' => '0', 'trial_interval' => 'day']);
        $this->assertTrue($trialPlan->hasTrial());
        $this->assertFalse($normalPlan->hasTrial());
    }

    /** @test */
    public function is_can_check_has_grace()
    {
        $gracePlan = factory(Plan::class)->create(['grace_period' => '1', 'grace_interval' => 'day']);
        $normalPlan = factory(Plan::class)->create(['grace_period' => '0', 'grace_interval' => 'day']);
        $this->assertTrue($gracePlan->hasGrace());
        $this->assertFalse($normalPlan->hasGrace());
    }

    /** @test */
    public function is_can_get_feature_by_slug()
    {
        $plan = factory(Plan::class)->create();
        factory(PlanFeature::class)->create(['plan_id' => $plan->id, 'name' => 'test feature']);

        $feature = $plan->getFeatureBySlug('test-feature');
        $notFoundFeature = $plan->getFeatureBySlug('not-found-feature');
        $this->assertInstanceOf(PlanFeature::class, $feature);
        $this->assertEquals('test feature', $feature->name);
        $this->assertEmpty($notFoundFeature);
    }

    /** @test */
    public function is_can_activate()
    {
        $plan = factory(Plan::class)->create(['is_active' => false]);

        $this->assertFalse($plan->is_active);

        $plan->activate();

        $this->assertTrue($plan->is_active);
    }

    /** @test */
    public function is_can_deactivate()
    {
        $plan = factory(Plan::class)->create(['is_active' => true]);

        $this->assertTrue($plan->is_active);

        $plan->deactivate();

        $this->assertFalse($plan->is_active);
    }
}
