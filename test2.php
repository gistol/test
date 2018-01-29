<?php

/**
 * Написать функцию которая из этого массива
 */
$data1 = [
    'parent.child.field' => 1,
    'parent.child.field2' => 2,
    'parent2.child.name' => 'test',
    'parent2.child2.name' => 'test',
    'parent2.child2.position' => 10,
    'parent3.child3.position' => 10,
];





//сделает такой и наоборот
$data = [
    'parent' => [
        'child' => [
            'field' => 1,
            'field2' => 2,
        ]
    ],
    'parent2' => [
        'child' => [
            'name' => 'test'
        ],
        'child2' => [
            'name' => 'test',
            'position' => 10
        ]
    ],
    'parent3' => [
        'child3' => [
            'position' => 10
        ]
    ],
];


$new_array = make_new_array($data1);
echo "<pre>";
print_r($new_array);


$return_array = make_return_array($new_array);
echo "<pre>";
print_r($return_array);

function make_new_array($array) {
    $new_array = array();
    foreach ($array as $key => $value) {
        $exp = explode('.', $key);
        echo $exp[0] . "<br>";
        echo $exp[1] . "<br>";
        echo $exp[2] . "<br>";
        // echo $key;
        $new_array[$exp[0]][$exp[1]][$exp[2]] = $value;
    }

    return $new_array;
}

function make_return_array($array) {
    $return_array = array();
    foreach ($array as $parent_key => $parent_value) {
        foreach ($parent_value as $child_key => $child_value) {
            foreach ($child_value as $key => $value) {
                $new_key_value = $parent_key . '.' . $child_key . '.' . $key;
                $return_array[$new_key_value] = $value;
            }
        }
    }
    return $return_array;
}

