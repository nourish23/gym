<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\BodyMeasurement;
use App\Models\Plan;
use App\Models\Meal;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone_number' => 'required|numeric',
        'plan_id' => '',
        'email' => 'required',
        'subscription_end_date' => '',
        'subscription_start_date' => "",
        'image_url' => '',
        'age' => 'required',
        'diseases_symptoms' => 'required',
        'health_problems' => 'required',
        'food_disliked' => 'required',
        'food_allergies' => 'required',
        'total_class'=>''
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        "last_name",
        "phone_number",
        "image_url",
        "fcm_token",
        "plan_id",
        "subscription_end_date",
        "subscription_start_date",
        'subscription_history' ,
        "is_active",
        "is_paid",
        "age",
        "diseases_symptoms",
        "health_problems",
        "food_disliked",
        "food_allergies",
        "supplements_taken",
        "do_you_have_anything_else_to_tell_us_about",
        "how_did_you_hear_about_us",
        "subscription_status",
        "terms_and_conditions_acceptance",
        'email',
        'password',
        'policy',
        'total_class'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at'    => 'datetime',
        'subscription_history' => 'array',
        'fcm_token' => 'array',
    ];

    protected $appends = [
        'full_name',
    ];

    protected function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function bodymeasurement()
    {
        return $this->hasMany(BodyMeasurement::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function meal()
    {
        return $this->hasMany(Meal::class);
    }
}
