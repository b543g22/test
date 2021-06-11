<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    // テーブル名
    protected $table = 'users';

    // 可変項目
    protected $fillable = [
        'name',
        'email',
        'password',
        'updkbn'
    ];

    /**
     * ユーザ登録処理
     * @param array $inputs
     */
    public static function createUser(array $inputs) {
        \DB::beginTransaction();
        try {
        User::create($inputs);
        \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }
}
