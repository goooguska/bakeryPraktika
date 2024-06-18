<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Baker>
 */
class BakerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            "Иванов Иван Иванович",
            "Петров Петр Петрович",
            "Сидоров Александр Владимирович",
            "Козлова Елена Викторовна",
            "Смирнова Ольга Игоревна",
            "Кузнецова Мария Александровна",
            "Николаева Анна Павловна",
            "Куликов Дмитрий Сергеевич",
            "Козлов Артем Михайлович",
            "Морозов Сергей Игоревич",
            "Орлова Наталья Андреевна",
            "Соколова Татьяна Дмитриевна",
            "Захаров Алексей Валентинович",
            "Белов Владимир Николаевич",
            "Павлова Екатерина Денисовна",
            "Семенов Артем Иванович",
            "Макарова Анастасия Степановна",
            "Андреев Илья Владимирович",
            "Кирсанова Евгения Петровна",
            "Лебедев Денис Анатольевич",
            "Корнеев Даниил Александрович",
            "Полякова Алина Сергеевна",
            "Карпова Вера Васильевна",
            "Григорьев Игорь Алексеевич",
            "Власов Дмитрий Юрьевич",
            "Зайцева Анна Степановна",
            "Медведев Никита Игоревич",
            "Жуков Максим Александрович",
            "Тимофеева Елена Ивановна",
            "Федорова Ольга Сергеевна"
        ];
        
        return [
            'name' => $this->faker->unique()->randomElement($names),
            'shift_at_work' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
        ];
    }
}
