<?php
// Using Fluent Query Builder
class User
{
    static function exists($uid)
    {
        $user = self::get($uid);
        return isset($user) ? TRUE : FALSE;
    }

    static function get($uid)
    {
        return DB::table('users')
                    ->where('uid', '=', $uid)
                    ->first();
    }

    static function add($data)
    {
        return DB::table('users')
                    ->insert_get_id($data);
    }

    static function update($uid, $data)
    {
        DB::table('users')
                    ->where('uid', '=', $id)
                    ->update($data);
    }

}
