<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $sambutan = Page::where('slug', 'sambutan-kepala-dinas')->first();
        $home = Post::create([
            'title' => 'Home',
            'content' => 'Statistik Website',
            'created_at' => Carbon::createMidnightDate(2000, 1, 1)
        ]);

        views($home)->record();

        $period_hari_ini = Period::pastDays(0);
        $period_kemarin = Period::pastDays(1);
        $period_minggu_ini = Period::pastWeeks(1);
        $period_bulan_ini = Period::pastMonths(1);

        $hari_ini = views($home)
            ->period($period_hari_ini)
            ->count();
        $kemarin = views($home)
            ->period($period_kemarin)
            ->count();
        $minggu_ini = views($home)
            ->period($period_minggu_ini)
            ->count();
        $bulan_ini = views($home)
            ->period($period_bulan_ini)
            ->count();
        $total = views($home)->unique()->count();

        return view('frontend.index', compact('sambutan', 'hari_ini', 'kemarin', 'minggu_ini', 'bulan_ini', 'total'));
    }
}
