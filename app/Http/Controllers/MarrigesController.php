<?php

namespace App\Http\Controllers;

use App\BudgetCategory;
use App\Guest;
use App\Like;
use App\Sector;
use App\Task;
use App\User;
use App\WeddingColor;
use App\WeddingStyle;
use App\WeddingWeather;

class MarrigesController extends Controller
{
    public function index()
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $user = User::find(auth()->user()->id);
        $sectors = Like::join('sectors', 'sector_id', '=', 'sectors.id')->inRandomOrder()->paginate(5);

        $tasks_incompleted = Task::where('user_id', auth()->user()->id)
            ->where('status', 0)
            ->orderBy('finish_date', 'desc')
            ->paginate(5);

        $likes = Like::where('user_id', auth()->user()->id)->get();

        //ESTAN LOS SECTORES INCOMPLETOS?
        if ($sectors->count() < 5) {
            $total = 5 - $sectors->count();
            $extra_sectors = Sector::inRandomOrder()->paginate($total);
        }

        //CALCULO DE PRESUPUESTO
        $global_estimated = 0;
        $global_final = 0;
        $global_pay = 0;

        $categories = BudgetCategory::where('user_id', auth()->user()->id)->get();

        foreach ($categories as $category) {
            $global_estimated = $global_estimated + $category->total_estimated();
            $global_final = $global_final + $category->total_final();

            if (!empty($category->spends)) {
                foreach ($category->spends as $spend) {
                    if (!empty($spend->payment)) {

                        $global_pay = $global_pay + $spend->payment->amount;
                    }
                }
            }
        }
        //INVITADOS
        $guests = Guest::where('user_id', auth()->user()->id)->get();

        //SOBRE MI BODA

        $colors = WeddingColor::all();
        $styles = WeddingStyle::all();
        $weathers = WeddingWeather::all();

        return view('users.marrige', compact('user', 'sectors', 'extra_sectors',
            'likes', 'tasks_incompleted', 'global_estimated', 'global_final', 'global_pay'
            , 'guests', 'colors', 'styles', 'weathers'));
    }
}
