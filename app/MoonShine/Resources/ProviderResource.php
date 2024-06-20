<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;
use MoonShine\Fields\Text; 
use MoonShine\Fields\Number;
use MoonShine\Fields\Date; 

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Select;

/**
 * @extends ModelResource<Provider>
 */
class ProviderResource extends ModelResource
{
    protected string $model = Provider::class;

    protected string $title = 'Providers';

    protected string $sortDirection = 'ASC';

    protected int $itemsPerPage = 10;

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make(__('Поставщик'), 'name')
                ->required()
                ->showOnExport(),
                Number::make(__('Цена'), 'cost') 
                ->required()
                ->showOnExport(),
                Number::make(__('Количество в кг'), 'quantity') 
                ->required()
                ->showOnExport(),
                Date::make(__('Дата поставки'), 'date_of_delivery')
                ->required()
                ->showOnExport()
            ]),
        ];
    }

    /**
     * @param Provider $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
    public function filters(): array 
    {
        return [
            Select::make('Ингредиент', 'ingredient_id')
                ->options(
                    Ingredient::pluck('name', 'id')
                        ->all()
                )->nullable()
        ];
    }
}
