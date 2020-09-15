<?php

namespace Modules\Booking\Exceptions;

use Exception;
use Illuminate\Http\RedirectResponse;

/**
 * Class RepositoryException.
 */
class BookingException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @param $request
     * @return RedirectResponse
     */
    public function render($request)
    {
        return redirect()->route('frontpage.booking-list', ['time_start' => $request->time_start, 'time_end' => $request->time_end])
            ->with(config('core.session_error'), __('booking::exceptions.booking_failed'));
    }
}
