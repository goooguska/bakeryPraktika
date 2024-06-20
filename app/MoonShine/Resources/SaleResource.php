<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;
use MoonShine\Fields\Number;
use MoonShine\Fields\Date; 
use App\Models\BakedProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use App\Models\User;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Select;

/**
 * @extends ModelResource<Sale>
 */
class SaleResource extends ModelResource
{
    protected string $model = Sale::class;

    protected string $title = 'Sales';

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
                Number::make(__('Количество продано'), 'quantity') 
                ->required()
                ->showOnExport(),
                Date::make(__('Дата продажи'), 'date_sale')
                ->required()
                ->showOnExport(),
                belongsTo::make(
                    __('Изделиe'),
                    'product',
                    static fn (Product $model) => $model->name,
                    new ProductResource(),
                )->badge('gray'),
                BelongsTo::make(
                    __('Пользователь'),
                    'user',
                    static fn (User $model) => $model->firstName,
                    new UserResource(),
                )->badge('gray'),
            ]),
        ];
    }

    /**
     * @param Sale $item
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
            
             
                
            
                
        ];
    }
}
