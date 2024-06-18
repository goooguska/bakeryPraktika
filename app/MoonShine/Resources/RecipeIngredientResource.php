<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use App\Models\RecipeIngredient;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<RecipeIngredient>
 */
class RecipeIngredientResource extends ModelResource
{
    protected string $model = RecipeIngredient::class;

    protected string $title = 'RecipeIngredients';
    
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
                BelongsTo::make(
                    __('Рецепт'),
                    'recipe',
                    static fn (Recipe $model) => $model->name,
                    new RecipeResource(),
                )->badge('gray'),
                BelongsTo::make(
                    __('Ингредиент'),
                    'ingredient',
                    static fn (Ingredient $model) => $model->name,
                    new IngredientResource(),
                )->badge('gray'),
            ]),
        ];
    }

    /**
     * @param RecipeIngredient $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
