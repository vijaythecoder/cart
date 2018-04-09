<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $items;
    public $total;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($items, $total)
    {
        $this->items = $items;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $cart = [];
        forEach($this->items as $item) {
            $cart[] = [
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity
            ];
        }   

        return $this->markdown('emails.orders.shipped', [
            'cart' => $cart,
            'total' => $this->total
        ]);
    }
}
