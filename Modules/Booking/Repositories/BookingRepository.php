<?php


namespace Modules\Booking\Repositories;


use Illuminate\Database\Eloquent\Model;
use Modules\Booking\Entities\Booking;
use Modules\Booking\Repositories\Contracts\BookingRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class BookingRepository extends BaseRepository implements BookingRepositoryInterface
{
    /**
     * FeedbackRepository constructor.
     * @param Booking $booking
     */
    public function __construct(Booking $booking)
    {
        $this->model = $booking;
    }

    /**
     * @param Model $model
     * @return mixed
     */
    function transformResource(Model $model)
    {
        $model->time_start = format_date_time($model->time_start);
        $model->time_end = format_date_time($model->time_end);
        $model->checked_in_at = $model->checked_in_at ? format_date_time($model->checked_in_at) : '';
        $model->checked_out_at = $model->checked_out_at ? format_date_time($model->checked_out_at) : '';
        $model->completed_at = $model->completed_at ? format_date_time($model->completed_at) : '';

        return $model;
    }

    /**
     * @return mixed
     */
    public function getLasRecordWithTrashed()
    {
        return $this->model->newQuery()
            ->withTrashed()
            ->whereNotNull('short_code')
            ->orderBy('created_at', 'desc')
            ->first();
    }

    /**
     * @param $id
     * @param $amount
     */
    public function updatePaid($id, $amount)
    {
        $model = $this->findById($id);
        $model->updatePaid($amount);
    }

    /**
     * @inheritDoc
     */
    public function incomplete()
    {
        return $this->model->incomplete()->orderBy('id', 'desc')->get();
    }
}
