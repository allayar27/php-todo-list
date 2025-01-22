<?php 

namespace Repository;

abstract class BaseModel
{
    public static function all() {}

    public static function create($data) {}

    public static function find($id) {}

    public static function update($id, $data) {}

    public static function delete($id) {}
}