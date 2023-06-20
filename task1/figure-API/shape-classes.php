<?php

abstract class Figure 
{
    private static string $description = 'Calculation of area and perimeter';
    abstract static protected function getPerimeter(array $sides);
    abstract static protected function getArea(array $sides);
    static function getDescription(): string {
        return self::$description;
    }
}

final class Square extends Figure 
{
    private int $side;
    private static string $descripton = 'square';
    private static string $requiredParameters = "Side length('side': 5)";
    private static string $parameter = 'side';

    function __construct(float $side) {
        $this->side = $side;        
    }

    static function getPerimeter($side): float {
        return  4 * $side;
    }

    static function getArea($side): float {
        return pow($side, 2);
    }

    static function getDescription(): string {
        return self::$descripton;
    }

    static function getRequiredParameters(): string {
        return self::$requiredParameters;
    }

    static function getParameter(): string {
        return self::$parameter;
    }
}

final class Circle extends Figure
{
    private int $radius;
    private static string $descripton = 'circle';
    private static string $requiredParameters = "Circle radius ('radius': 5)";
    private static string $parameter = "radius";

    function __construct(float $radius) {
        $this->radius = $radius;
    }

    static function getPerimeter($radius): float {
        return 2 * round(pi() * $radius, 2);
    }

    static function getArea($radius): float {
        return round(pi() * pow($radius, 2), 2);
    }

    static function getDescription(): string {
        return self::$descripton;
    }

    static function getRequiredParameters(): string {
        return self::$requiredParameters;
    }

    static function getParameter(): string {
        return self::$parameter;
    }
}

final class Triangle extends Figure
{
    private array $sides;
    private static $descripton = 'triangle';
    private static string $requiredParameters = "Sides length ('sides': [3, 4, 5])";
    private static string $parameter = "sides";

    function __construct(array $sides) {
        $this->sides = $sides;
    }

    static function getPerimeter($sides): float {
        return array_sum($sides);
    }

    static function getArea($sides): float {
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

    static function getParameter(): string {
        return self::$parameter;
    }
}
