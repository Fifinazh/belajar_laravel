<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id_customer', 'order_code', 'order_date', 'order_end_date', 'order_status', ];

    //ORM : Object Relation mapping/model : untuk menghubungkan class atau object
    //biasanya menggunakan LEFT JOIN, RIGHT JOIN, INNER JOIN, OUTER JOIN
    // tapi di laravel atau framework menggunakan ONE TO MANY, MANY TO ONE, MANY TO MANY
    // ONE TO MANY : belongsTo
    // MANY TO ONE : hasMany

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }
}
