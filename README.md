#### Уроки PHP
В репозитории расположены практические задания к урокам по PHP.     
Комментарии к задачам:    
##### Задача 1    
Явно напрашивается пузырьковая сортировка.    
##### Задача 2    
Решено с помощью рекурсии.   
##### Задача 3
Сделана попытка атомизировать функции - каждая из них выполняет свое минимальное действие.    
##### Задача 4     
Точка входа: http://localhost:3000/task1/figure-API    

Примеры запросов и ожидаеые ответы:    

**Запрос:**   
GET:   http://localhost:3000/task1/figure-API    

**Ответ:**        
```
[
  {
    "figure": "квадрат",
    "required parameters": "Длина стороны ('side': 5)"
  },
  {
    "figure": "круг",
    "required parameters": "Радиус круга ('radius': 5)"
  },
  {
    "figure": "треугольник",
    "required parameters": "Длина сторон ('sides': [3, 4, 5])"
  }
]
```
**Запрос:**   
POST:   http://localhost:3000/task1/figure-API   

**Доступные параметры:**
```
"figure": ["square", "circle", "triangle"],
"parameter": ["square", "perimeter"],
["side", "radius", "sides"]: [5, [3, 4, 5]]
```

**Пример запроса:**    
POST:   http://localhost:3000/task1/figure-API   
```
{
"figure": "circle",
"parameter": "perimeter",
"radius": 5
}
```

**Пример ответа:** 
```
{
  "message": "Perimeter of circle 31.42"
}
```