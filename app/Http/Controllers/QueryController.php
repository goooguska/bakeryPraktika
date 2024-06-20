<?php

namespace App\Http\Controllers;

use App\Models\BakedProduct;
use App\MoonShine\Pages\Query1;
use App\MoonShine\Pages\Query10;
use App\MoonShine\Pages\Query2;
use App\MoonShine\Pages\Query3;
use App\MoonShine\Pages\Query4;
use App\MoonShine\Pages\Query5;
use App\MoonShine\Pages\Query6;
use App\MoonShine\Pages\Query7;
use App\MoonShine\Pages\Query8;
use App\MoonShine\Pages\Query9;
use App\MoonShine\Resources\Query1Resource;
use Carbon\Carbon;
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
                ->setContentView('queries/query1', ['queries' => $query1])
                ->setBreadcrumbs([ '#' => 'Запрос 1']);
    }
    public function query2(Request $request)
    {
        $query2 = BakedProduct::with('product')
            ->selectRaw('products.name as product_name, SUM(baked_products.quantity) as total_quantity')
            ->join('products', 'baked_products.product_id', '=', 'products.id')
            ->groupBy('products.name')
            ->get();

                return Query2::make('Запрос 2','query2' )
                ->setContentView('queries/query2', ['queries' => $query2])
                ->setBreadcrumbs([ '#' => 'Запрос 2']);

    }
    public function query3(Request $request)
    {
        $query3 = DB::table('ingredients as i')
        ->join('providers as p', 'i.provider_id', '=', 'p.id')
        ->select('i.name as ingredient', 'p.name as provider', 'p.cost', 'p.date_of_delivery')
        ->get();

        return Query3::make('Запрос 3','query3' )
        ->setContentView('queries/query3', ['queries' => $query3])
        ->setBreadcrumbs([ '#' => 'Запрос 3']);

    }
    public function query4(Request $request)
    {
        
        $name = $request->input('name');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $query4 = DB::table('baked_products as bp')
        ->join('products as p', 'bp.product_id', '=', 'p.id')
        ->join('product_recipes as pr', 'p.id', '=', 'pr.product_id')
        ->join('recipe_ingredients as ri', 'pr.recipe_id', '=', 'ri.recipe_id')
        ->join('ingredients as i', 'ri.ingredient_id', '=', 'i.id')
        ->where('bp.date_baking', '>=', $start_date)
        ->where('bp.date_baking', '<=', $end_date)
        ->where('i.id','=', $name)
        ->select('i.name as ingredient_name', 'p.name', DB::raw('COUNT(bp.id) as total_products'))
        ->groupBy('p.id', 'p.name', 'i.name')
        ->get();
   
        return Query4::make('Запрос 4','query4' )
        ->setContentView('queries/query4', ['queries' => $query4])
        ->setBreadcrumbs([ '#' => 'Запрос 4']);

    }
    public function query5(Request $request)
    {
        $specific_date = $request->input('specific_date');
        $query5  = DB::table('baked_products as bp')
        ->select('p.id', 'p.name', DB::raw('SUM(bp.quantity) as total_quantity'), DB::raw('SUM(bp.quantity * p.cost) as total_cost'))
        ->join('products as p', 'bp.product_id', '=', 'p.id')
        ->where('bp.date_baking', '=', $specific_date) 
        ->groupBy('p.id', 'p.name')
        ->get();

        return Query5::make('Запрос 5','query5' )
        ->setContentView('queries/query5', ['queries' => $query5])
        ->setBreadcrumbs([ '#' => 'Запрос 5']);

    }
    public function query6(Request $request)
    {
        $name = $request->input('name');
        $query6 = DB::table('baked_products as bp')
            ->join('products as p', 'bp.product_id', '=', 'p.id')
            ->join('bakers as b', 'bp.baker_id', '=', 'b.id')
            ->where('b.id', $name)
            ->whereBetween('bp.date_baking', [
                Carbon::now()->subDays(7)->startOfDay(), 
                Carbon::now()->endOfDay()
            ])
            ->select([
                'p.name as product_name',
                'bp.date_baking',
                'bp.quantity',
                'b.name as baker_name'
            ])
            ->get();
            return Query6::make('Запрос 6','query6' )
            ->setContentView('queries/query6', ['queries' => $query6])
            ->setBreadcrumbs([ '#' => 'Запрос 6']);
    }
    public function query7(Request $request)
    {
        $recipeName = $request->input('name');
        $query7 = DB::table('recipes as r')
        ->join('recipe_ingredients as ri', 'r.id', '=', 'ri.recipe_id')
        ->join('ingredients as i', 'ri.ingredient_id', '=', 'i.id')
        ->where('r.id', '=', $recipeName)
        ->select('r.name as recipe', 'i.name as ingredient')
        ->get();
            return Query7::make('Запрос 7','query7' )
            ->setContentView('queries/query7', ['queries' => $query7])
            ->setBreadcrumbs([ '#' => 'Запрос 7']);
    }
    public function query8(Request $request)
    {
        
        $name = $request->input('name');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $query8 = DB::table('sales as s')
            ->join('users as u', 's.user_id', '=', 'u.id')
            ->where('s.product_id', '=', $name)
            ->where('s.date_sale', '>=', $start_date)
            ->where('s.date_sale', '<=', $end_date)
            ->select('u.firstName', 'u.email', 's.date_sale', 's.quantity')
            ->get();

            return Query8::make('Запрос 8','query8' )
            ->setContentView('queries/query8', ['queries' => $query8])
            ->setBreadcrumbs([ '#' => 'Запрос 8']);
    }
    public function query9(Request $request)
    {
        $query9 = DB::table('products as p')
        ->join(DB::raw('(
            SELECT product_id, YEAR(date_sale) AS sale_year, MONTH(date_sale) AS sale_month, SUM(quantity) AS total_quantity
            FROM sales
            GROUP BY product_id, sale_year, sale_month
        ) as monthly_sales'), 'p.id', '=', 'monthly_sales.product_id')
        ->select('p.name as product_name', DB::raw('AVG(monthly_sales.total_quantity) as avg_monthly_sales'))
        ->groupBy('p.id')
        ->get();

            return Query9::make('Запрос 9','query9' )
            ->setContentView('queries/query9', ['queries' => $query9])
            ->setBreadcrumbs([ '#' => 'Запрос 9']);
    }
    public function query10(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        $query10 = DB::table('sales as s')
        ->join('products as p', 's.product_id', '=', 'p.id')
        ->where('s.date_sale', '>=', $start_date)
        ->where('s.date_sale', '<=', $end_date)
        ->groupBy('s.date_sale')
        ->select([
            DB::raw('SUM(s.quantity) as total_quantity'),
            DB::raw('SUM(s.quantity * p.cost) as total_sales')
        ])
        ->get();


            return Query10::make('Запрос 10','query10' )
            ->setContentView('queries/query10', ['queries' => $query10])
            ->setBreadcrumbs([ '#' => 'Запрос 10']);

    }
}  
