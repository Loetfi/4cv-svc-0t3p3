<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /*
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'OTP';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'OTPSendId','PhoneNumber', 'Message', 'CodeOTP', 'Campaign'
    ];

    /**
     * Returns the action column html for datatables.
     *
     * @param \App\User
     * @return string
     */

    // public static function laratablesSearchableColumns()
    // {
    //     return ['first_name', 'last_name'];
    // }

    public static function laratablesCustomAction($user)
    {
        return '<button type="button" class="btn btn-primary btn-sm '.$user->PhoneNumber.'">
        Edit
        </button>
        <button type="button" class="btn btn-primary btn-sm">
        View
        </button>';
        // return view('datatables.includes.action')->render();
    }

    /**
     * Returns the name column value for datatables.
     *
     * @param \App\User
     * @return string
     */
    // public static function laratablesCustomName($user)
    // {
    //     return $user->first_name . ' ' . $user->last_name;
    // }

    /**
     * Additional columns to be loaded for datatables.
     *
     * @return array
     */
    public static function laratablesAdditionalColumns()
    {
        return ['Message', 'CodeOTP'];
    }

    /**
     * first_name column should be used for sorting when name column is selected in Datatables.
     *
     * @return string
     */
    public static function laratablesOrderName()
    {
        return 'Message';
    }


    /**
     * Adds the condition for searching the name of the user in the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @param string search term
     * @param \Illuminate\Database\Eloquent\Builder
     */
    public static function laratablesSearchName($query, $searchValue)
    {
        return $query->orWhere('Message', 'like', '%'. $searchValue. '%')
        // ->orWhere('last_name', 'like', '%'. $searchValue. '%')
        ;
    }

    /**
     * Returns string status from boolean status for the datatables.
     *
     * @return string
     */
    // public function laratablesActive()
    // {
    //     return $this->active ? 'Active' : 'Inactive';
    // }

    /**
     * Specify row class name for datatables.
     *
     * @return string
     */
    // public function laratablesRowClass()
    // {
    //     return $this->active ? 'text-success' : 'text-danger';
    // }

    /**
     * Returns the data attribute for row id of the user.
     *
     * @return array
     */
    public function laratablesRowData()
    {
        return [
            'OTPSendId' => $this->OTPSendId,
        ];
    }
}
