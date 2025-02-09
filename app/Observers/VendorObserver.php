<?php

namespace App\Observers;

use App\Mail\EmailNotification;
use App\Models\Vendor;
use Illuminate\Support\Facades\Mail;

class VendorObserver
{
    /**
     * Handle the Vendor "created" event.
     */
    public function created(Vendor $vendor): void
    {
        
    }

    /**
     * Handle the Vendor "updated" event.
     */
    public function updated(Vendor $vendor): void
    {
        if($vendor->isDirty('status') && $vendor->status == 'approved'){
            $data =[
                "subject" => "Vendor request Approved",
                "to" => $vendor->name,
                "message" => "Your vendor request has been approved. Your login credentials are email: $vendor->email and password: admin123. Please do change your password after login.
                login_url: ". asset('/vendo'),
              
            ];
            Mail::to($vendor->email)->send(new EmailNotification($data));
        }
    }

    /**
     * Handle the Vendor "deleted" event.
     */
    public function deleted(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "restored" event.
     */
    public function restored(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "force deleted" event.
     */
    public function forceDeleted(Vendor $vendor): void
    {
        //
    }
}
