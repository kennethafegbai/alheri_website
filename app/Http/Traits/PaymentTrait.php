<?php

namespace App\Http\Traits;
use App\Models\Reserve;


trait PaymentTrait
{
    /**
     * Create a new transaction instance.
     *
     * @param string $invoice
     * @param string $amount
     * @param string $customer_name
     * @param string $customer_tel
     * @param string $customer_email
     * @param int $customer_address
     * @param int $arrival
     * @param int $departure
     * @param int $persons
     * @param int $room_id
     * @param int $category_id
     * @return boolean
     */
    public function createReserve(
        string $invoice,
        float $amount,
        string $customer_name,
        string $customer_tel,
        string $customer_email,
        string $customer_address,
        string $arrival,
        string $departure,
        string $persons,
        string $room_id,
        string $category_id,
        int $status
    ) {
        Reserve::create([
            'invoice' => $invoice,
            'amount' =>  $amount,
            'customer_name' => $customer_name,
            'customer_tel' => $customer_tel,
            'customer_email' => $customer_email,
            'customer_address' => $customer_address,
            'arrival' => $arrival,
            'departure' => $departure,
            'persons' => $persons,
            'room_id' => $room_id,
            'category_id' => $category_id,
            'status' =>  $status,
        ]);
    }
}
