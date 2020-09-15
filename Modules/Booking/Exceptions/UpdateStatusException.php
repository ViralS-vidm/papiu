<?php

namespace Modules\Booking\Exceptions;

use Exception;
use Illuminate\Http\RedirectResponse;

/**
 * Class RepositoryException.
 */
class UpdateStatusException extends Exception
{
    public static function notHasStatus($status)
    {
        return new static(__('booking::exceptions.not_has_status', ['status' => $status]));
    }

    public static function notPaidEnough()
    {
        return new static(__('booking::exceptions.not_paid_enough'));
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @return RedirectResponse
     */
    public function render()
    {
        return response()->json([
            'message' => $this->getMessage()
        ], 400);
    }
}
