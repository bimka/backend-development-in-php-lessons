<?php

require_once __DIR__."/shape-classes.php";

class Controller
{
    static function getInfo(): string {
        $response = [];
        $classes = self::getChildClasses(Figure::class);

        foreach ($classes as $class) {
            $item = 
                [
                    'figure' => $class::getDescription(),
                    'required parameters' => $class::getRequiredParameters()
                ];
            array_push($response, $item);
        }
    
        return json_encode($response, JSON_UNESCAPED_UNICODE);
    }
    
    static function calculate($request): string {

        $classname = $request["figure"];   
        unset($request["figure"]);
        if (!class_exists($classname)) {
            $message = "Unknown figure: $classname";
            return json_encode(['message' => $message]);
        }      
        
        $parameterName = ucfirst($request["parameter"]);
        unset($request["parameter"]);
        $parameterMethod = 'get' . $parameterName;
        if (!method_exists($classname, $parameterMethod)) {
            $message = "$parameterName is not available for calculation";
            return json_encode(['message' => $message]);
        }

        if (!array_key_exists($classname::getParameter(), $request)) {    
            $key = implode(', ', array_keys($request)); 
            $message = "Unknown parameter: $key";
            return json_encode(['message' => $message]);
        }

        $sides = $request[$classname::getParameter()];
        $method = $classname::$parameterMethod(json_decode($sides));

        $message = "$parameterName of $classname $method";
    
        return json_encode(['message' => $message]);
        
    }
    
    private static function getChildClasses($baseClass): array {
        $childClasses = [];
        
        foreach (get_declared_classes() as $class) {
            if (is_subclass_of($class, $baseClass)) {
                array_push($childClasses, $class);
            }
        }
    
        return $childClasses;
    }
}
