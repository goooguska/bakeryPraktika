<?php

namespace App\Http\Controllers;

use App\MoonShine\Pages\Query1;
use App\MoonShine\Resources\Query1Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Components\Modal;
use MoonShine\Http\Responses\MoonShineJsonResponse;
use MoonShine\Pages\Page;
use MoonShine\Pages\PageComponents;
use MoonShine\Pages\ViewPage;

class QueryController extends Controller
{
    public function __invoke(Request $request)
    {
    }
   
    public function query1(Request $request)
    {
        try {
            $name = $request->input('name');
            $quantity = intval($request->input('quantity'));
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $query1 = DB::table('providers')
                ->join('ingredients as i', 'providers.id', '=', 'i.provider_id')
                ->select('providers.id', 'providers.name')
                ->where('i.name', '=', $name)
                ->where('i.quantity', '>=', $quantity)
                ->where('providers.date_of_delivery', '>=', $start_date)
                ->where('providers.date_of_delivery', '<=', $end_date)
                ->get();
        
                return Query1::make('Запрос 1','query1' )
                ->setContentView('query1', ['articles' => $query1])
                ->setBreadcrumbs([ '#' => 'Запрос 1']);
             
        } catch (\Throwable $th) {
            return "жопа";
        }
    }
    public function query2(Request $request)
    {
        
    }
}
