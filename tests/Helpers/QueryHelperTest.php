<?php

use App\Helpers\QueryHelper;
use PHPUnit\Framework\TestCase;

class QueryHelperTest extends TestCase
{
    public function addTrueValueProvider()
    {
        return [
            'true 1' => [
                'users',
                '/users/1',
            ],
            'true 2' => [
                'users',
                '/users/test/2',
            ],
            'true 3' => [
                'users',
                '/users/a/b/c',
            ],
        ];
    }

    public function addFalseValueProvider()
    {
        return [
            'false 1' => [
                'users',
                'users/1',
            ],
            'false 2' => [
                'users',
                '/site/users/1',
            ],
            'false 3' => [
                'users',
                '/usersss/1',
            ],
            'false 4' => [
                ['users'],
                '/users/1',
            ],
        ];
    }

    /**
     * @dataProvider addTrueValueProvider
     */
    public function testTrueGetMainEntityName($cmp, $value)
    {
        $this->assertSame($cmp, QueryHelper::getMainEntityName($value));
    }

    /**
     * @dataProvider addFalseValueProvider
     */
    public function testFalseGetMainEntityName($cmp, $value)
    {
        $this->assertNotSame($cmp, QueryHelper::getMainEntityName($value));
    }
}
