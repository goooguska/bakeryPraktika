<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Sale;
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
        return [];
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
                MenuItem::make(
                    static fn() => __('Запрос 1'),
                    new Query1Resource()
                    
                ),
            ])
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
   
     public function boot(): void
     {
         parent::boot();
  
        //  moonshineColors()
        //  ->background('#a25133') // Теплый пастельный бежевый
        //  ->content('#FFFCF5') // Нежный кремовый
        //  ->tableRow('#FFE4C4') // Светлый пастельный персиковый
        //  ->dividers('#FFDAB9') // Пастельный персиковый
        //  ->borders('#FFCBA4') // Пастельный абрикосовый
        //  ->buttons('#FFA07A') // Светлый лососевый
        //  ->primary('#FF7F50') // Коралловый
        //  ->secondary('#FFDAB9'); // Пастельный персиковый
        // moonshineColors()
        // ->background('#FAF3E0') // Светло-карамельный
        // ->content('#FFF8E1') // Кремовый
        // ->tableRow('#F5DEB3') // Светло-коричневый
        // ->dividers('#D2B48C') // Бежевый
        // ->borders('#C2A384') // Карамельный
        // ->buttons('#A0522D') // Коричнево-рыжий (терракотовый)
        // ->primary('#8B4513') // Темно-коричневый (шоколадный)
        // ->secondary('#CD853F'); // Карамельный
        // moonshineColors()
        // ->background('#EFE8D8') // Светлый кофе с молоком
        // ->content('#EDE0C8') // Светло-бежевый
        // ->tableRow('#D2B48C') // Бежевый
        // ->dividers('#BC8F8F') // Светло-розово-коричневый
        // ->borders('#8B4513') // Темно-коричневый (шоколадный)
        // ->buttons('#A52A2A') // Коричнево-красный (каштановый)
        // ->primary('#6B4226') // Темно-шоколадный
        // ->secondary('#8B4513'); // Темно-коричневый (шоколадный)
    // moonshineColors()
    // ->background('#F5F5DC') // Бежевый
    // ->content('#FAEBD7') // Античный белый
    // ->tableRow('#D3B58D') // Светло-коричневый
    // ->dividers('#C19A6B') // Сиенский
    // ->borders('#8B7355') // Светло-шоколадный
    // ->buttons('#8B4513') // Темно-коричневый (шоколадный)
    // ->primary('#5C4033') // Кофейный
    // ->secondary('#7B3F00'); // Шоколадно-коричневый
    // moonshineColors()
    // ->background('#FFEFD5') // Папайя
    // ->content('#FFE4C4') // Бискайский
    // ->tableRow('#D2B48C') // Бежевый
    // ->dividers('#BC8F8F') // Розовато-коричневый
    // ->borders('#CD853F') // Персиковый
    // ->buttons('#8B4513') // Темно-коричневый (шоколадный)
    // ->primary('#A0522D') // Рыжевато-коричневый (терракотовый)
    // ->secondary('#8B0000'); // Темно-красный (бордовый)

     }
    protected function theme(): array
    {
        return [
            
        ];
    }
}
