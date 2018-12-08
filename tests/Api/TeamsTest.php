<?php

namespace PrivatePackagist\ApiClient\Api;

class TeamsTest extends ApiTestCase
{
    public function testAll()
    {
        $expected = [
            [
                'id' => 1,
                'name' => 'Owners',
                'permission' => 'owner',
                'members' => [
                    [
                        'id' => 12,
                        'username' => 'username'
                    ]
                ],
                'projects' => [
                ],
            ]
        ];

        /** @var Customers&\PHPUnit_Framework_MockObject_MockObject $api */
        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with($this->equalTo('/teams/'))
            ->will($this->returnValue($expected));

        $this->assertSame($expected, $api->all());
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Teams::class;
    }
}