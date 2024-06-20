<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Sale;
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
use App\MoonShine\Resources\BakedProductResource;
use App\MoonShine\Resources\BakerResource;
use App\MoonShine\Resources\IngredientResource;
use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\ProductRecipeResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\ProviderResource;
use App\MoonShine\Resources\Query1Resource;
use App\MoonShine\Resources\RecipeIngredientResource;
use App\MoonShine\Resources\RecipeResource;
use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\SaleResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            Query1::make('Запрос 1', 'query1'),
            Query2::make('Запрос 2', 'query2'),
            Query3::make('Запрос 3', 'query3'),
            Query4::make('Запрос 4', 'query4'),
            Query5::make('Запрос 5', 'query5'),
            Query6::make('Запрос 6', 'query6'),
            Query7::make('Запрос 7', 'query7'),
            Query8::make('Запрос 8', 'query8'),
            Query9::make('Запрос 9', 'query9'),
            Query10::make('Запрос 10', 'query10'),
        ];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make('База данных', [ 
                MenuItem::make(
                    static fn() => __('Новости'),
                    new NewsResource()
                ),
                MenuItem::make(
                    static fn() => __('Пользователи'),
                    new UserResource()
                ),
                MenuItem::make(
                    static fn() => __('Роли'),
                    new RoleResource()
                ),
                MenuItem::make(
                    static fn() => __('Пекари'),
                    new BakerResource()
                ),
                MenuItem::make(
                    static fn() => __('Ингредиенты'),
                    new IngredientResource()
                ),
                MenuItem::make(
                    static fn() => __('Поставщики'),
                    new ProviderResource()
                ),
                MenuItem::make(
                    static fn() => __('Изделия'),
                    new ProductResource()
                ),
                MenuItem::make(
                    static fn() => __('Рецепты'),
                    new RecipeResource()
                ),
                MenuItem::make(
                    static fn() => __('Рецепты и ингредиенты'),
                    new RecipeIngredientResource()
                ),
                MenuItem::make(
                    static fn() => __('Продукты и рецепты'),
                    new ProductRecipeResource()
                ),
                MenuItem::make(
                    static fn() => __('Испечённые изделия'),
                    new BakedProductResource()
                ),
                MenuItem::make(
                    static fn() => __('Продажи'),
                    new SaleResource()
                ),
            ]),
            MenuGroup::make('Запросы',[
                MenuItem::make('Запрос 1', Query1::make('Запрос 1', 'query1')),
                MenuItem::make('Запрос 2', Query2::make('Запрос 2', 'query2')),
                MenuItem::make('Запрос 3', Query3::make('Запрос 3', 'query3')),
                MenuItem::make('Запрос 4', Query4::make('Запрос 4', 'query4')),
                MenuItem::make('Запрос 5', Query3::make('Запрос 5', 'query5')),
                MenuItem::make('Запрос 6', Query3::make('Запрос 6', 'query6')),
                MenuItem::make('Запрос 7', Query3::make('Запрос 7', 'query7')),
                MenuItem::make('Запрос 8', Query3::make('Запрос 8', 'query8')),
                MenuItem::make('Запрос 9', Query3::make('Запрос 9', 'query9')),
                MenuItem::make('Запрос 10', Query3::make('Запрос 10', 'query10')),
            ])
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
   
     public function boot(): void
     {
         parent::boot();

     }
    protected function theme(): array
    {
        return [
            
        ];
    }
}
