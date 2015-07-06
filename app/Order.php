<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {


    protected $fillable = [
        'user_id',
        'total'
    ];
    public function items()
    {
        return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('CodeCommerce\User');
    }

    public function pagseguro()
    {
        return $this->hasOne('CodeCommerce\PagSeguro');
    }

    public function getStatusNameAttribute()
    {
        switch($this->status){
            case 0:
                $status = 'Order received';
                break;
            case 1:
                $status = 'Accepted order';
                break;
            case 2:
                $status = 'Request packed';
                break;
            case 3:
                $status = 'Request sent';
                break;
            case 4:
                $status = 'Complete';
                break;
            default:
                $status = null;
        }
        return $status;
    }

    public function updateStatus()
    {
        $this->status = ($this->status < 4) ? $this->status + 1 : 4;
        return $this->save();
    }
}
