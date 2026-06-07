<<<<<<< HEAD
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'amount',
        'payment_date',
        'payment_method',
        'status',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
=======
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'amount',
        'payment_date',
        'payment_method',
        'status',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
>>>>>>> ea9245f15f147113814d5380b19e5c30f321ec5d
}