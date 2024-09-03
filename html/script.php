<?php

/* HW1 */

$a = 5;
$b = '05';
var_dump($a == $b);
var_dump((int)'012345');
var_dump((float)123.0 === (int)123.0);
var_dump(0 == 'hello, world');

$a = 1;
$b = 2;
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
echo "a = " . $a . "\n";
echo "b = " . $b . "\n";

/* HW2 */


/* 1. Реализовать основные 4 арифметические операции в виде функции с тремя 
параметрами – два параметра это числа, третий – операция. 
Обязательно использовать оператор return. */


function operation($arg1, $arg2, $op)
{
    if ($op === "+") {
        $sum = $arg1 + $arg2;
        echo $sum;
    }
    if ($op === "-") {
        $dif = $arg1 - $arg2;
        echo $dif;
    }
    if ($op === "*") {
        $mult = $arg1 * $arg2;
        echo $mult;
    }
    if ($op === "/") {
        $div = $arg1 / $arg2;
        echo $div;
    } else {
        echo "Wrong operation";
    }
}
operation(5, 1, "/");

/* 2. Реализовать функцию с тремя параметрами: 
function mathOperation($arg1, $arg2, $operation), где $arg1, 
$arg2 – значения аргументов, $operation – строка с названием операции. 
В зависимости от переданного значения операции выполнить одну из 
арифметических операций (использовать функции из пункта 3) и 
вернуть полученное значение (использовать switch). */

function mathOperationtion($arg1, $arg2, $operation)
{

    switch ($operation) {
        case "+":
            $sum = $arg1 + $arg2;
            echo $sum;
            break;
        case "-":
            $dif = $arg1 - $arg2;
            echo $dif;
            break;
        case "*":
            $mult = $arg1 * $arg2;
            echo $mult;
            break;
        case "/":;
            $div = $arg1 / $arg2;
            echo $div;
            break;
        default:
            echo "Wrong operation";
    }
}

mathOperationtion(5, 8, "+");

/* 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, 
а в качестве значений – массивы с названиями городов из соответствующей области. 
Вывести в цикле значения массива, чтобы результат был таким: 
Московская область: Москва, Зеленоград, Клин 
Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт 
Рязанская область … (названия городов можно найти на maps.yandex.ru). */


$array = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],

];

foreach ($array as $region => $cities) {
    echo $region . ': ' . implode(', ', $cities) . PHP_EOL;
}

/* 4. Объявить массив, индексами которого являются буквы русского языка, 
а значениями – соответствующие латинские буквосочетания 
(‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). 
Написать функцию транслитерации строк. */



function transliter($string)
{

    $alfabet = [
        'а' => 'a',
        '6' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'e' => 'е',
        'ё' => 'e',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sch',
        'ь' => '\'',
        'ы' => 'y',
        'Ъ' => '\'',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
    ];

    $string = mb_strtolower($string, 'UTF-8');

    $result = '';

    for ($i = 0; $i < mb_strlen($string, 'UTF-8'); $i++) {
        $char = mb_substr($string, $i, 1, 'UTF-8');

        if (array_key_exists($char, $alfabet)) {
            $result .= $alfabet[$char];
        } else {
            $result .= $char;
        }
    }
    return $result;
}

echo transliter('Привет тебе');

/* 5. *С помощью рекурсии организовать функцию возведения числа в степень. 
Формат: function power($val, $pow), где $val – заданное число, $pow – степень. */


function power($val, $pow)
{
    if($pow == 0){
        return 1;
    }

    if ($pow < 0) {
        return 1 / power($val, -$pow);
    }

    return $val * power($val, $pow - 1);
}

echo power(3, 3);
