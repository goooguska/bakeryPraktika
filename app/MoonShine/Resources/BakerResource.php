<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Baker;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Fields\Text; 
use MoonShine\Fields\Date; 
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Baker>
 */
class BakerResource extends ModelResource
{
    protected string $model = Baker::class;

    protected string $title = 'Bakers';

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
                Text::make(__('Полное имя'), 'name')
                ->required()
                ->showOnExport(),
                Date::make(__('Смена'), 'shift_at_work')
                ->required()
                ->showOnExport()
                ->withTime(),
            ]),
        ];
    }

    /**
     * @param Baker $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
