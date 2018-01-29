<?php
/**
 * Нужно написать код, который из массива выведет то что приведено ниже в комментарии.
 */
$x = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
/*
print_r($x) - должен выводить это:
Array
(
    [h] => Array
        (
            [g] => Array
                (
                    [f] => Array
                        (
                            [e] => Array
                                (
                                    [d] => Array
                                        (
                                            [c] => Array
                                                (
                                                    [b] => Array
                                                        (
                                                            [a] =>
                                                        )
                                                )
                                        )
                                )
                        )
                )
        )
);*/


arsort($x);
print_r(buildArray($x));

function buildArray($from, $to = []) {
    if (empty($from)) {
        return null;
    }
    $to[array_shift($from)] = buildArray($from, $to);
    return $to;
}
