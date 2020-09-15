<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Cms\Entities\ConfigCms;

class BookingDone extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    /**
     * Create a new message instance.
     *
     * @param $booking
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $config = ConfigCms::where('key', ConfigCms::KEY_MAIL_CONTENT_CMS)->first();
        $content = $config->value;
        $fields = [
            '!!name!!' => $this->booking->contact_name,
            '!!number!!' => $this->booking->contact_number,
            '!!email!!' => $this->booking->contact_email,
            '!!address!!' => $this->booking->address,
            '!!time_start!!' => $this->booking->time_start,
            '!!time_end!!' => $this->booking->time_end,
            '!!product_name!!' => $this->booking->product->name,
            '!!services_combo!!' => $this->booking->services->implode('name', ', '),
        ];
        foreach ($fields as $key => $field) {
            $content = str_replace($key, $field, $content);
        }
        return $this->view('mails.booking.done')->subject($config->title)->with(['content' => $content]);
    }
}
