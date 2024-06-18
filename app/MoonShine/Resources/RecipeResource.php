<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;
use MoonShine\Fields\Text;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Date;

/**
 * @extends ModelResource<Recipe>
 */
class RecipeResource extends ModelResource
{
    protected string $model = Recipe::class;

    protected string $title = 'Recipes';

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
                Text::make(__('Информация'), 'info')
                ->required()
                ->showOnExport(),
                Text::make(__('Время готовки'), 'baking_time')
                ->required()
                ->showOnExport()
            ]),
        ];
    }

    /**
     * @param Recipe $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
