<?php

namespace Tests\Unit\Models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById(): void
    {
        verify($user = User::findIdentity(100))->notEmpty();
        verify($user->username)->equals('admin');

        verify(User::findIdentity(999))->empty();
    }

    public function testFindUserByAccessToken(): void
    {
        verify($user = User::findIdentityByAccessToken('100-token'))->notEmpty();
        verify($user->username)->equals('admin');

        verify(User::findIdentityByAccessToken('non-existing'))->empty();
    }

    public function testFindUserByUsername(): void
    {
        verify($user = User::findByUsername('admin'))->notEmpty();
        verify(User::findByUsername('not-admin'))->empty();
    }

    #[\PHPUnit\Framework\Attributes\Depends('testFindUserByUsername')]
    public function testValidateUser(): void
    {
        $user = User::findByUsername('admin');
        verify($user->validateAuthKey('test100key'))->notEmpty();
        verify($user->validateAuthKey('test102key'))->empty();

        verify($user->validatePassword('admin'))->notEmpty();
        verify($user->validatePassword('123456'))->empty();
    }
}
