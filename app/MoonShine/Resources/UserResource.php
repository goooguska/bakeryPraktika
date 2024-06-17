<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use MoonShine\Fields\Relationships\BelongsTo;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text; 

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';

    protected string $sortDirection = 'ASC';


    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make(__('Имя'), 'firstName')
                ->required()
                ->showOnExport(),
                BelongsTo::make(
                    __('Роль'),
                    'role',
                    static fn (Role $model) => $model->name,
                    new RoleResource(),
                )->badge('green'),
                Text::make(__('Номер телефона'), 'phoneNumber')
                ->required()
                ->showOnExport(),
                Text::make(__('Логин'), 'login')
                ->required()
                ->showOnExport(),
                Text::make(__('Email'), 'email')
                ->required()
                ->showOnExport(),
            ]),
        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
