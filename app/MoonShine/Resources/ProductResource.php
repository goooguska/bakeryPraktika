<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Number;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image; 

/**
 * @extends ModelResource<Product>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Products';

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
                Text::make(__('Описание'), 'info')
                ->required()
                ->showOnExport(),
                Number::make(__('Цена'), 'cost') 
                ->required()
                ->showOnExport(),
                Number::make(__('Количество в шт'), 'quantity') 
                ->required()
                ->showOnExport(),
                Number::make(__('Вес в гр.'), 'weight') 
                ->required()
                ->showOnExport(),
                Text::make(__('Тип'), 'type')
                ->required()
                ->showOnExport(),
                // Image::make('Изображение','image') 
            ]),
        ];
    }

    /**
     * @param Product $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
