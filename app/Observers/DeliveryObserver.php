<?php

namespace App\Observers;

use App\Handlers\TransactionHandler;
use App\Models\Delivery;

class DeliveryObserver
{
    /**
     * Handle the delivery "created" event.
     *
     * @param \App\Models\Delivery $delivery
     * @return void
     */
    public function created(Delivery $delivery)
    {
        if($delivery->total_charge > 0){
            $transactionHandler = new TransactionHandler();
            $transactionHandler->createTransaction(0, $delivery->total_charge, $delivery->delivery_time,
                $delivery, 'Booking Delivery'
            );
        }

    }

    /**
     * Handle the delivery "updated" event.
     *
     * @param \App\Models\Delivery $delivery
     * @return void
     */
    public function updated(Delivery $delivery)
    {
        //
    }

    /**
     * Handle the delivery "deleted" event.
     *
     * @param \App\Models\Delivery $delivery
     * @return void
     */
    public function deleted(Delivery $delivery)
    {
        //
    }

    /**
     * Handle the delivery "restored" event.
     *
     * @param \App\Models\Delivery $delivery
     * @return void
     */
    public function restored(Delivery $delivery)
    {
        //
    }

    /**
     * Handle the delivery "force deleted" event.
     *
     * @param \App\Models\Delivery $delivery
     * @return void
     */
    public function forceDeleted(Delivery $delivery)
    {
        //
    }
}
