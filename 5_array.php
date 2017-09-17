<?php ## скрипт выводит массив без дублей значений

// удаляет дублирующие значения
function noDouble($old_arr){

    //создаем новый массив
    $new_array = array();

    //берем каждое значение $old_arr
    foreach($old_arr as $value){
        //если $new_array пустой записуем первое значение($value)
        //и переходим на следующий индекс
        if(empty($new_array)){
            $new_array[] = $value;
            continue;
        }

        // выполняем проверку $new_array и $value по всему массиву,
        // если $value не равен ни какому значению $new_array,
        //записуем его в $new_array
        if(check($new_array, $value)){
            $new_array[] = $value;
        }
    }
    return $new_array;
}

//выполняет поиск значения в массиве,
//если найдено возвращает true
function check($arr1, $old_value){
    foreach($arr1 as $value) {
        if ($old_value == $value) {
            return false;
        }
        if($old_value != $value){
            continue;
        }
    }
    return true;
}

$array = array(5, 5, 5, 5, 6, 6, 8);

$new_array = noDouble($array);

echo "<pre>";
print_r($new_array);
echo "</pre>";


