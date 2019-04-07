<?php

class UserModel
{
    public static $users = [];

    public function add($name, $age)
    {
        $usersLength = count(self::$users);
        $id = $usersLength ? self::$users[$usersLength - 1]->id + 1 : 1;
        self::$users[] = new User($id, $name, $age);
        return self::$users[$usersLength];
    }

    public function edit($id, $name, $age)
    {
        for ($i = 0; $i < count(self::$users); $i++) { 
            if (self::$users[$i]->$id === $id) {
                self::$users[$i]->name = $name;
                self::$users[$i]->age = $age;
                return self::$users[$i];
            }
        }

        return null;
    }

    public function delete($id)
    {
        for ($i = 0; $i < count(self::$users); $i++) { 
            if (self::$users[$i]->getId() === $id) {
                $user = self::$users[$i];
                array_splice(self::$users, $i, 1);
                return $user;
            }
        }

        return null;
    }

    public function get($id = null)
    {
        if ($id === null) return self::$users;

        for ($i = 0; $i < count(self::$users); $i++) { 
            if (self::$users[$i]->id === $id) return self::$users[$i];
        }
        
        return null;
    }
}
