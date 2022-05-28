<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserDashboardController extends Controller
{
    private $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    /**
     * TODO: wynieść przekierowanie admina gdzie indziej
     * @return View
     */
    public function index()
    {
        $user = auth()->user();

        if($user->is_admin == true)
            return redirect()->route('admin.home');

        $user->load('subscriptions');

        if ($user->subscriptions->first() == null)
            $next_payment = null;
        else
            $next_payment = $this->dashboardService->getNextPaymentDate($user);

        return view('user.dashboard', compact('user', 'next_payment'));
    }
}
