<?php

namespace Modules\Product\Exceptions;

use Exception;

/**
 * Class RepositoryException.
 */
class ProductBookingException extends Exception
{
    public static function noFreeProduct()
    {
        return new static(__('product::exceptions.no_product_free'));
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @return void
     */
    public function render()
    {
        return redirect()->back()->with(config('core.session_error'), $this->getMessage());
    }
}
