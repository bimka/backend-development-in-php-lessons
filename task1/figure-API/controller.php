<?php

function getInfo() {
    $arr = [
        [
            'figure' => Square::getDescription(),
            'required parameters' => Square::getRequiredParameters()
        ],
        [
            'figure' => Circle::getDescription(),
            'required parameters' => Circle::getRequiredParameters()
        ],
        [
            'figure' => Triangle::getDescription(),
            'required parameters' => Triangle::getRequiredParameters()
        ],
    ];

    return json_encode($arr);
}

function calculate($request) {
    $message = '';
    $classname = $request["figure"];    
    unset($request["figure"]);
    $parameter = $request["parameter"];
    unset($request["parameter"]);
    $figureName = $classname::getDescription();
    $sides = $request;

    if ($parameter == "perimeter") {
        $parameterName = "Периметр";
        $parameterResult =  $classname::getPerimeter($sides);
    } elseif ($parameter == "square") {
        $parameterName = "Площадь";
        $parameterResult =  $classname::getSquare($sides);
    } else {
        return json_encode(['message' => "Этот параметр не доступен для расчета"]);
    }
    
    $message = $parameterName . ' ' . $figureName . 'а - ' . 
               $parameterResult;

    return json_encode(['message' => $message]);
    
}

