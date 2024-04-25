<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role_id', 'photo', 'status', 'provider', 'provider_id','supporter',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function savedJobs()
    {
        return $this->hasMany(JobSave::class);
    }

    public static function calculateTodayUsers()
    {
        $todayTotalUsers = User::whereDate('created_at', Carbon::today())->count();

        $yesterdayTotalUsers = User::whereDate('created_at', Carbon::yesterday())->count();
        $percentageChange = ($todayTotalUsers - $yesterdayTotalUsers) / ($yesterdayTotalUsers ?: 1) * 100;

        return [
            'todayTotalUsers' => $todayTotalUsers,
            'percentageChange' => $percentageChange,
        ];
    }
    public static function calculateNewMember()
    {

        $todayNewClients = User::where('supporter','yes')->whereDate('created_at', Carbon::today())->count();


        $yesterdayNewClients = User::where('supporter','yes')->whereDate('created_at', Carbon::yesterday())->count();
        $percentageChange = ($todayNewClients - $yesterdayNewClients) / ($yesterdayNewClients ?: 1) * 100;

        return [
            'todayNewClients' => $todayNewClients,
            'percentageChange' => $percentageChange,
        ];
    }
    public static function getAllUsers()
    {
        return self::all();
    }
    public static function getMember()
    {
        $member= User::where('supporter','yes')->get();
        return $member;

    }
}
