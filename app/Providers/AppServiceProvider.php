<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Menu;
use App\Models\Post;
use CyrildeWit\EloquentViewable\Support\Period;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (!$this->app->environment('production')) {
            $this->app->register('App\Providers\FakerServiceProvider');
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        $frontmenus = Menu::orderBy('order')->get()->skip(1);
        View::share('frontmenus', $frontmenus);

        $gambardepan = \DB::table('gambar_depan')->latest()->first();
        View::share('gambardepan', $gambardepan);

        $footerlinks = \DB::table('footer_links')->orderBy('title')->get()->split(2);
        View::share('footerlinks', $footerlinks);

        $home = Post::where('title', 'Home')->first();
        $period_hari_ini = Period::pastDays(0);
        $period_kemarin = Period::pastDays(1);
        $period_minggu_ini = Period::pastWeeks(1);
        $period_bulan_ini = Period::pastMonths(1);
        $period_tahun_ini = Period::pastYears(1);

        $hari_ini = views($home)
            ->period($period_hari_ini)
            ->unique()
            ->count();
        $kemarin = views($home)
            ->period($period_kemarin)
            ->unique()
            ->count();
        $minggu_ini = views($home)
            ->period($period_minggu_ini)
            ->unique()
            ->count();
        $bulan_ini = views($home)
            ->period($period_bulan_ini)
            ->unique()
            ->count();
        $tahun_ini = views($home)
            ->period($period_tahun_ini)
            ->unique()
            ->count();
        $total = views($home)->unique()->count();

        View::share('hari_ini', $hari_ini);
        View::share('kemarin', $kemarin);
        View::share('minggu_ini', $minggu_ini);
        View::share('bulan_ini', $bulan_ini);
        View::share('tahun_ini', $tahun_ini);
        View::share('total', $total);
    }
}
