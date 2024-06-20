<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;
use App\Models\Provider;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Date;
use MoonShine\Fields\DateRange;
use MoonShine\Fields\Text; 
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;

/**
 * @extends ModelResource<Ingredient>
 */
class IngredientResource extends ModelResource
{
    protected string $model = Ingredient::class;

    protected string $title = 'Ingredients';

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
                Text::make(__('Название'), 'name')
                ->required()
                ->showOnExport(),
                Number::make(__('Количество в кг'), 'quantity') 
                ->required()
                ->showOnExport(),
                BelongsTo::make(
                    __('Поставщик'),
                    'provider',
                    static fn (Provider $model) => $model->name,
                    new ProviderResource(),
                )->badge('info'),

            ]),
        ];
    }

    /**
     * @param Ingredient $item
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
            Select::make('Поставщик', 'provider_id')
                ->options(
                    Provider::pluck('name', 'id')
                        ->all()
                )->nullable()->searchable(),
                Select::make('Ингредиент', 'id')
                ->options(
                    Ingredient::pluck('name', 'id')
                        ->all()
                )->nullable()->searchable(),
                Number::make('Количество', 'quantity'),
                Select::make('Дата', 'date_of_delivery')
                ->options(
                    Provider::pluck('id', 'date_of_delivery')
                        ->all()
                )->nullable()->searchable(),
                // Text::make('dada',$datesString),
                // Date::make('date_of_delivery','date_of_delivery')
                
            
                
        ];
    }
}
