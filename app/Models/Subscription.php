<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'investment_amount',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function countSubscription(){
        $data=Subscription::count();

        if($data){
            return $data;
        }
        return 0;
    }

    public static function calculateTodayInvestment()
    {
        $todayTotalInvestment = Subscription::whereDate('created_at', Carbon::today())->sum('investment_amount');

        $yesterdayTotalInvestment = Subscription::whereDate('created_at', Carbon::yesterday())->sum('investment_amount');
        $percentageChange = ($todayTotalInvestment - $yesterdayTotalInvestment) / ($yesterdayTotalInvestment ?: 1) * 100;

        return [
            'todayTotalInvestment' => $todayTotalInvestment,
            'percentageChange' => $percentageChange,
        ];
    }
    public static function getTotalInvestment()
    {
        $totalInvestment = Subscription::sum('investment_amount');

        $previousTotalInvestment = $totalInvestment;

        $percentageChange = ($totalInvestment - $previousTotalInvestment) / ($previousTotalInvestment ?: 1) * 100;

        return [
            'totalInvestment' => $totalInvestment,
            'percentageChange' => $percentageChange,
        ];
    }
}

