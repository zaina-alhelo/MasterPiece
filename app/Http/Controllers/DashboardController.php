<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Bmi;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
    {
        $usersCount = User::count();
        $articlesCount = Blog::count();
        $recipesCount = Recipe::count();
    $today = now()->format('Y-m-d');


    $bmis = Bmi::with('user')
        ->whereDate('created_at', $today)
        ->get();
        $genderStats = User::select(DB::raw('gender, COUNT(*) as count'))
            ->groupBy('gender')
            ->get();

        $genderData = $genderStats->map(function ($item) {
            return [
                'name' => $item->gender,
                'value' => $item->count
            ];
        });

        $bmiStats = DB::table('bmis')
            ->join('users', 'bmis.user_id', '=', 'users.id')
            ->select(
                DB::raw('users.gender, 
                         bmis.age_group, 
                         AVG(bmis.bmi_change_percentage) as avg_bmi_change,
                         AVG(bmis.bmi) as avg_bmi')
            )
            ->groupBy('users.gender', 'bmis.age_group')
            ->get();

        $bmiData = $bmiStats->map(function ($item) {
            return [
                'gender' => $item->gender,
                'age_group' => $item->age_group,
                'avg_bmi_change' => round($item->avg_bmi_change, 2),
                'avg_bmi' => round($item->avg_bmi, 2)
            ];
        });

        return view('Dashboard.dashboard', compact(
            'usersCount', 
            'articlesCount', 
            'recipesCount', 
            'genderData', 
            'bmiData', 
            'bmis'
        ));
    }
}