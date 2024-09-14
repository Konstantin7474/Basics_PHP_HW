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
    if ($pow == 0) {
        return 1;
    }

    if ($pow < 0) {
        return 1 / power($val, -$pow);
    }

    return $val * power($val, $pow - 1);
}

echo power(3, 3);

/* HW4 */

/* 1. Придумайте класс, который описывает любую сущность 
из предметной области библиотеки: книга, шкаф, комната и т.п.
2. Опишите свойства классов из п.1 (состояние).
3. Опишите поведение классов из п.1 (методы).
4. Придумайте наследников классов из п.1. Чем они будут отличаться? */

class LibrarySubscription
{
    protected int $number;
    protected float $price_month;
    protected int $period_month;

    public function __construct(int $number, float $price_month, int $period_month)
    {
        $this->number = $number;
        $this->price_month = $price_month;
        $this->period_month = $period_month;
    }

    public function getNumber(): float
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function getPrice(): float
    {
        return $this->price_month;
    }

    public function setPrice(float $price_month): void
    {
        $this->price_month = $price_month;
    }

    public function getPeriod(): int
    {
        return $this->period_month;
    }

    public function setPeriod(int $period_month): void
    {
        $this->period_month = $period_month;
    }

    public static function getPeriodPriceSum(LibrarySubscription $sub): float
    {
        return $sub->price_month * $sub->period_month;
    }
}

class StudentLibrarySubscription extends LibrarySubscription
{
    protected float $discount;
    public function __construct(int $number, float $price_month, int $perid_month, float $discount)
    {
        parent::__construct($number, $price_month, $perid_month);
        $this->discount = $discount;
    }
    function getFinalPrice(): float
    {
        return self::getPeriodPriceSum($this) * (1 - $this->discount);
    }
}

class RetireeLibrarySubscription extends StudentLibrarySubscription
{
    protected int $increase;
    public function __construct(int $number, float $price_month, int $perid_month, float $discount, int $increase)
    {
        parent::__construct($number, $price_month, $perid_month, $discount);
        $this->increase = $increase;
    }
    function getFinalPeriod(): float
    {
        return $this->period_month * $this->increase;
    }
}

$sub1 = new LibrarySubscription(1, 100.25, 1);
$sub2 = new LibrarySubscription(2, 100.25, 2);
$sub3 = new StudentLibrarySubscription(3, 100.25, 1, 0.5);
$sub4 = new RetireeLibrarySubscription(4, 100.25, 2, 0.5, 2);

echo LibrarySubscription::getPeriodPriceSum($sub2) . PHP_EOL;

echo $sub3->getFinalPrice() . PHP_EOL;

echo $sub4->getFinalPeriod() . PHP_EOL;

/* 5. Создайте структуру классов ведения книжной номенклатуры.
— Есть абстрактная книга.
— Есть цифровая книга, бумажная книга.
— У каждой книги есть метод получения на руки.

У цифровой книги надо вернуть ссылку на скачивание, 
а у физической – адрес библиотеки, где ее можно получить. 
У всех книг формируется в конечном итоге статистика по кол-ву прочтений.
Что можно вынести в абстрактный класс, а что надо унаследовать? */


abstract class Book
{
    protected string $name;
    protected int $number;
    protected int $count_statistic;

    public function __construct(string $name, int $number, int $count_statistic)
    {
        $this->name = $name;
        $this->number = $number;
        $this->count_statistic = $count_statistic;
    }
}



class RealBook extends Book
{
    protected string $address;

    public function __construct(string $name, int $number, int $count_statistic, string $address)
    {
        parent::__construct($name, $number, $count_statistic);
        $this->address = $address;
    }

    function getAddress(): string
    {
        return $this->address;
    }
}

class DigitalBook extends Book
{
    protected string $url;

    public function __construct(string $name, int $number, int $count_statistic, string $url)
    {
        parent::__construct($name, $number, $count_statistic);
        $this->url = $url;
    }

    function getUrl(): string
    {
        return $this->url;
    }
}

$book1 = new DigitalBook('book1', 1, 0, 'url1');
$book2 = new RealBook('book2', 2, 0, 'address1');

echo $book1->getUrl() . PHP_EOL;
echo $book2->getAddress() . PHP_EOL;

/* 6. Дан код: */

class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

/* Что он выведет на каждом шаге? Почему?
Этот код выведет 1234, так как перерменная $x статична,
и ее значение будет каждый раз увеличиваться так как она
определяется один раз.

Немного изменим п.5 */

class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {}
$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

/* Что он выведет теперь? */
/* В этом случае вывод будет тот же сымый, так как переменная так же
статична и ее определение в функции одно на все классы, поэтому в момент
повторного обращения экземпляра $b1, переменная так же будет уже увеличина. */