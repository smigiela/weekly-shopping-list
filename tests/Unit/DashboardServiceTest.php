<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\DashboardService;
use PHPUnit\Framework\TestCase;

class DashboardServiceTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function getNextPaymentDate()
    {
        $service = DashboardService::class;

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'stripe_id' => 'cus_Lew2aGbJoZyGYo'
        ]);

        $response = $service->getNextPaymentDate($user);

        $this->assertIsNotArray($response);
    }
}
