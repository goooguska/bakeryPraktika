<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Query1;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Query1>
 */
class Query1Resource extends ModelResource
{
    protected string $model = Query1::class;

    protected string $title = 'Запрос 1';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
       
        return [
            Field::make('ID', 'id'),
            Field::make('Name', 'name'),
        ];
    }

    /**
     * @param Query1 $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function buttons(): array
    {
      
        return [
          
        ];
    }
    public function rules(Model $item): array
    {
        return [];
    }
}
