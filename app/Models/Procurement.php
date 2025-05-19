<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'procurements';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_name', 'product_category', 'price', 'quantity', 'requester_user_id', 'supervisor_approval', 'manager_approval', 'status'];
    

    /**
     * Get the user that owns the procurement.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'requester_user_id');
    }
}
