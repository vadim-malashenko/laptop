<?php

namespace Laptop\Math\Test;

class ComplexNumberDataProvider
{
    public static function valuesProvider(int $form): array
    {
        return [
            [
                [[0, 0], [0.0, 0.0]],
                [[1, 1], [1.0, 1.0]],
                [[ - 1, 2], [ - 1.0, 2.0]],
                [[1.2, - 3.4], [1.2, - 3.4]],
                [[ - 3, - 4], [ - 3.0, - 4.0]]
            ],
            [
                [[1, M_PI], [1.0, M_PI]],
                [[ - 1, M_PI / 2], [ - 1.0, M_PI / 2]],
                [[1.2, - M_PI], [1.2, - M_PI]],
                [[ - 3.4, - 2 * M_PI], [ - 3.4, - 2 * M_PI]]
            ]
        ][$form];
    }

    public static function reProvider(int $form): array
    {
        return [
            [
                [[0, 0], 0.0],
                [[1, 1], 1.0],
                [[ - 1, 2], - 1.0],
                [[1.2, - 3.4], 1.2],
                [[ - 3, - 4], - 3.0]
            ],
            [
                [[1, M_PI], cos(M_PI)],
                [[ - 1, M_PI / 2], - cos(M_PI / 2)],
                [[1.2, - M_PI / 6], 1.2 * cos( - M_PI / 6)],
                [[ - 3.4, - M_PI / 3], - 3.4 * cos( - M_PI / 3)]
            ]
        ][$form];
    }

    public static function imProvider(int $form): array
    {
        return [
            [
                [[0, 0], 0.0],
                [[1, 1], 1.0],
                [[ - 1, 2], 2.0],
                [[1.2, - 3.4], - 3.4],
                [[ - 3, - 4], - 4.0]
            ],
            [
                [[1, M_PI], sin(M_PI)],
                [[ - 1, M_PI / 2], - sin(M_PI / 2)],
                [[1.2, - M_PI / 6], 1.2 * sin( - M_PI / 6)],
                [[ - 3.4, - M_PI / 3], - 3.4 * sin( - M_PI / 3)]
            ]
        ][$form];
    }

    public static function modProvider(int $form): array
    {
        return [
            [
                [[0, 0], 0.0],
                [[1, 1], sqrt(2)],
                [[ - 1, 2], sqrt(5)],
                [[1.2, - 3.4], sqrt(1.2 ** 2 + 3.4 ** 2)],
                [[ - 3, - 4], 5.0]
            ],
            [
                [[1, M_PI], 1.0],
                [[ - 1, M_PI / 2], - 1.0],
                [[1.2, - M_PI / 6], 1.2],
                [[ - 3.4, - M_PI / 3], - 3.4]
            ]
        ][$form];
    }

    public static function argProvider(int $form): array
    {
        return [
            [
                [[0, 0], 'Division by zero'],
                [[1, 1], atan( - 1)],
                [[ - 1, 2], atan(2)],
                [[1.2, - 3.4], atan(3.4 / 1.2)],
                [[ - 3, - 4], atan( - 4 / 3)]
            ],
            [
                [[1, M_PI], M_PI],
                [[ - 1, M_PI / 2], M_PI / 2],
                [[1.2, - M_PI / 6], - M_PI / 6],
                [[ - 3.4, - M_PI / 3], - M_PI / 3]
            ]
        ][$form];
    }

    public static function recProvider(int $form): array
    {
        return [
            [
                [[0, 0], 'Division by zero'],
                [[3, 4], [0.12, - 0.16]],
                [[ - 3, - 4], [ - 0.12, 0.16]]
            ],
            [
                [[1, M_PI], [1.0, - M_PI]],
                [[ - 1, M_PI / 2], [ - 1.0, - M_PI / 2]],
                [[1.2, - M_PI], [1 / 1.2, M_PI]],
                [[ - 3.4, - 2 * M_PI], [1 / - 3.4, 2 * M_PI]]
            ]
        ][$form];
    }

    public static function addProvider(int $form): array
    {
        return [
            [
                [[0, 0], [0, 0], [0.0, 0.0]],
                [[0, 0], [1, 1], [1.0, 1.0]],
                [[1, 1], [1, 1], [2.0, 2.0]],
                [[1.2, 0], [ - 5.6, 7.8], [ - 4.4, 7.8]],
                [[1.2, - 3.4], [ - 5.6, 7.8], [ - 4.4, 4.4]]
            ]
        ][$form];
    }

    public static function subProvider(int $form): array
    {
        return [
            [
                [[0, 0], [0, 0], [0.0, 0.0]],
                [[0, 0], [1, 1], [ - 1.0, - 1.0]],
                [[1, 1], [1, 1], [0.0, 0.0]],
                [[1.2, 0], [ - 5.6, 7.8], [6.8, - 7.8]],
                [[1.2, - 3.4], [ - 5.6, 7.8], [6.8, - 11.2]]
            ]
        ][$form];
    }

    public static function mulProvider(int $form): array
    {
        return [
            [
                [[0, 0], [0, 0], [0.0, 0.0]],
                [[0, 0], [1, 1], [0.0, 0.0]],
                [[1, 1], [1, 1], [0.0, 2.0]],
                [[1.2, 0], [ - 5.6, 7.8], [ - 6.72, 9.36]],
                [[1.2, - 3.4], [ - 5.6, 7.8], [19.8, 28.4]]
            ],
            [
                [[1, M_PI / 2], [2, M_PI / 2], [2.0, M_PI]],
                [[1.2, - M_PI], [ - 5.6, 0], [ - 1.2 * 5.6, - M_PI]],
                [[ - 1.2, - M_PI / 2], [ - 5.6, M_PI / 4], [1.2 * 5.6, - M_PI / 4]]
            ]
        ][$form];
    }

    public static function divProvider(int $form): array
    {
        return [
            [
                [[0, 0], [0, 0], 'Division by zero'],
                [[0, 0], [1, 1], [0.0, 0.0]],
                [[1, 1], [1, 1], [1.0, 0.0]]
            ]
        ][$form];
    }
    
    public static function setFormProvider(int $form): array
    {
        return [
            [
                [[0, 1], 'Division by zero'],
                [[1, 1], [sqrt(2), atan( - 1)]],
                [[ - 1, 2], [sqrt(5), atan(2)]],
                [[3, - 4], [5.0, atan(4 / 3)]],
                [[ - 5, 0], [sqrt(25), atan(0)]]
            ],
            [
                [[1, 0], [1.0, 0.0]],
                [[1, M_PI], [ - 1, 0]],
                [[2, - M_PI / 2], [0, - 2]],
                [[ - 3, M_PI / 3], [ - 1.5, - 3 * sin(M_PI / 3)]],
                [[ 1 / 2, M_PI / 6], [cos(M_PI / 6) / 2, 1 / 4]]
            ]
        ][$form];
    }
}