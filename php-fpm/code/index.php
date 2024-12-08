<?php

// 1. Реализовать основные 4 арифметические операции в виде функции с 
// тремя параметрами – два параметра это числа, третий – операция. Обязательно использовать оператор return.

function calculate(int $num1, int $num2, string $operation): int|string|float{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            return $num2 != 0 ? $num1 / $num2 : 'Деление на ноль';
        default:
            return 'Неизвестная операция';
    }
}

echo calculate(2, 3, '+') . PHP_EOL;

// 2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), 
// где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. 
// В зависимости от переданного значения операции выполнить одну из арифметических операций 
// (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation(int $arg1, int $arg2, string $operation): int|string|float {
    return calculate($arg1, $arg2, $operation);

}
// 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, 
// а в качестве значений – массивы с названиями городов из соответствующей области. Вывести 
// в цикле значения массива, чтобы результат был таким: Московская область: Москва, Зеленоград, 
// Клин Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт Рязанская область … 
// (названия городов можно найти на maps.yandex.ru).

$regions = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Скопин']
];

foreach ($regions as $region => $cities) {
    echo "$region: " . implode(', ', $cities) . PHP_EOL;
}

// 4. Объявить массив, индексами которого являются буквы русского языка, 
// а значениями – соответствующие 
// латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => 
// ‘yu’, ‘я’ => ‘ya’). Написать функцию транслитерации строк.

function transliterate(string $string): string {
    $translitMap = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo',
        'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm',
        'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ъ' => '',
        'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
    ];
    $result = '';
    $string = mb_strtolower($string);
    for ($i = 0; $i < mb_strlen($string); $i++) {
        $char = mb_substr($string, $i, 1);
        $result .= $translitMap[$char] ?? $char;
    }

    return ucfirst($result);
}

echo transliterate('Привет') . PHP_EOL;

// 5. *С помощью рекурсии организовать функцию возведения числа в степень.
//  Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

function power($val, $pow) {
    if ($pow == 0) return 1;
    if ($pow < 0) return 1 / power($val, -$pow);
    return $val * power($val, $pow - 1);
}

echo power(2, -2) . PHP_EOL;

// 6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
// 22 часа 15 минут
// 21 час 43 минуты.

function getCurrentTime() {
    $hours = date('H');
    $minutes = date('i');

    $hourWord = ($hours % 10 == 1 && $hours != 11) ? 'час' : (($hours % 10 >= 2 && $hours % 10 <= 4 && ($hours < 10 || $hours > 20)) ? 'часа' : 'часов');
    $minuteWord = ($minutes % 10 == 1 && $minutes != 11) ? 'минута' : (($minutes % 10 >= 2 && $minutes % 10 <= 4 && ($minutes < 10 || $minutes > 20)) ? 'минуты' : 'минут');

    return "$hours $hourWord $minutes $minuteWord";
}

echo getCurrentTime() . PHP_EOL;
