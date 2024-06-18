<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductRecipe;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<ProductRecipe>
 */
class ProductRecipeResource extends ModelResource
{
    protected string $model = ProductRecipe::class;

    protected string $title = 'ProductRecipes';

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
                    __('Изделие'),
                    'product',
                    static fn (Product $model) => $model->name,
                    new ProductResource(),
                )->badge('gray'),
                BelongsTo::make(
                    __('Рецепт'),
                    'recipe',
                    static fn (Recipe $model) => $model->name,
                    new RecipeResource(),
                )->badge('gray'),
               
              
            ]),
        ];
    }

    /**
     * @param ProductRecipe $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
