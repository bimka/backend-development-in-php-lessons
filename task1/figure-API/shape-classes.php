<?php

abstract class Figure 
{
    private static string $description = "Рассчет площади и периметра для геометрических фигур. Доступные фигуры: Квадрат, Окружность, Треугольник";
    abstract static protected function getPerimeter(array $sides);
    abstract static protected function getSquare(array $sides);
    static function getDescription(): string {
        return self::$description;
    }
}

final class Square extends Figure 
{
    private int $side;
    private static string $descripton = "квадрат";
    private static string $requiredParameters = "Длина стороны ('side': 5)";

    function __construct(float $side) {
        $this->side = $side;        
    }

    static function getPerimeter($side): float {
        return  4 * $side['side'];
    }

    static function getSquare($side): float {
        return pow($side['side'], 2);
    }

    static function getDescription(): string {
        return self::$descripton;
    }

    static function getRequiredParameters(): string {
        return self::$requiredParameters;
    }
}

final class Circle extends Figure
{
    private int $radius;
    private static string $descripton = "круг";
    private static string $requiredParameters = "Радиус круга ('radius': 5)";

    function __construct(float $radius) {
        $this->radius = $radius;
    }

    static function getPerimeter($radius): float {
        return 2 * round(pi() * $radius['radius'], 2);
    }

    static function getSquare($radius): float {
        return round(pi() * pow($radius['radius'], 2), 2);
    }

    static function getDescription(): string {
        return self::$descripton;
    }

    static function getRequiredParameters(): string {
        return self::$requiredParameters;
    }
}

final class Triangle extends Figure
{
    private array $sides;
    private static $descripton = "треугольник";
    private static string $requiredParameters = "Длина сторон ('sides': [3, 4, 5])";
    
    function __construct(array $sides) {
        $this->sides = $sides;
    }

    static function getPerimeter($sides) {
        return array_sum(json_decode($sides['sides']));
    }

    static function getSquare($sides): float {
        $halfMeter = self::getPerimeter($sides) / 2;

        return sqrt($halfMeter * ($halfMeter - $sides[0]) * 
                                 ($halfMeter - $sides[1]) * 
                                 ($halfMeter - $sides[2]));
    }

    static function getDescription(): string {
        return self::$descripton;
    }

    static function getRequiredParameters(): string {
        return self::$requiredParameters;
    }
}
