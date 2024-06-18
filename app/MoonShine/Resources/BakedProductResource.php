<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\BakedProduct;
use App\Models\Baker;
use App\Models\Product;
use App\Models\ProductRecipe;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Date; 

/**
 * @extends ModelResource<BakedProduct>
 */
class BakedProductResource extends ModelResource
{
    protected string $model = BakedProduct::class;

    protected string $title = 'BakedProducts';
    
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
                    __('Пекарь'),
                    'baker',
                    static fn (Baker $model) => $model->name,
                    new BakerResource(),
                )->badge('gray'),
                BelongsTo::make(
                    __('Изделие'),
                    'product',
                    static fn (Product $model) => $model->name,
                    new ProductResource(),
                )->badge('gray'),
                Number::make(__('Количество в шт'), 'quantity') 
                ->required()
                ->showOnExport(),
                Date::make(__('Дата приготовления'), 'date_baking')
                ->required()
                ->showOnExport(),
                Date::make(__('Дата продажи'), 'date_sale')
                ->required()
                ->showOnExport()
            ]),
        ];
    }

    /**
     * @param BakedProduct $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
