<?php

namespace Vanthao03596\LaravelSubscriptions\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Vanthao03596\LaravelSubscriptions\Models\Plan;
use Vanthao03596\LaravelSubscriptions\Models\PlanFeature;

class PlanTest extends TestCase
{
    /** @test */
    public function is_has_many_features()
    {
        $plan = factory(Plan::class)->create();

        $planFeatures1 = factory(PlanFeature::class)->create(['plan_id' => $plan->id]);
        $planFeatures2 = factory(PlanFeature::class)->create(['plan_id' => $plan->id]);

        $this->assertInstanceOf(PlanFeature::class, $plan->features()->first());
        $this->assertSame($planFeatures2->name, $plan->features()->latest()->first()->name);
        $this->assertCount(2, $plan->features);
    }
}
