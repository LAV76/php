<?php

// echo "Привет, GeekBrains!<br>".date("Y-m-d H:i:s") ."<br><br>";

// echo "Что-то еще 123456";

// phpinfo();


$a = 5;
$b = '05';
var_dump($a == $b);

// При сравнении с == строка '05' преобразуется в число 5.
// Таким образом, 5 == 5 возвращает true

var_dump((int)'012345');

// Строка '012345' преобразуется в целое число. Лидирующий ноль игнорируется.
// Результат: 12345.

var_dump((float)123.0 === (int)123.0);

// (float)123.0 — это число с плавающей точкой: 123.0.
// (int)123.0 — это целое число: 123.
// Оператор === сравнивает не только значения, но и типы.
// Типы float и int разные, поэтому результат false.

var_dump(0 == 'hello, world');
// PHP 8.0
// Строка 'hello, world' не может быть преобразована в число.
// Сравнение 0 == 'hello, world' возвращает false, поскольку строка 'hello, world' не является числом.

// PHP 7.4

// Строка 'hello, world' при сравнении с числом преобразуется в 0 (потому что не содержит чисел).
// Таким образом, 0 == 0 возвращает true.

$a = 1;
$b = 2;

$a = $a + $b; // a = 1 + 2 = 3
$b = $a - $b; // b = 3 - 2 = 1
$a = $a - $b; // a = 3 - 1 = 2

echo "a = $a, b = $b"; // a = 2, b = 1