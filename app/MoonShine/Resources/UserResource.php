<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Phone; 
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text; 
use MoonShine\Fields\Email; 
use MoonShine\Fields\Password;
/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';

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
                Text::make(__('Имя'), 'firstName')
                ->required()
                ->showOnExport(),
                Phone::make(__('Номер телефона'), 'phoneNumber')
                ->required()
                ->showOnExport(),
                Text::make(__('Логин'), 'login')
                ->required()
                ->showOnExport(),
                Email::make(__('Email'), 'email')
                ->required()
                ->showOnExport(),
                Password::make(__('Пароль'), 'password')
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
