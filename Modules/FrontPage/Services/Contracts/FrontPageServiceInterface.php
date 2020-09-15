<?php


namespace Modules\FrontPage\Services\Contracts;


interface FrontPageServiceInterface
{
    public function getDataProductList();

    public function getDetailProduct($id);

    public function getDataHome();

    public function getDataBookingList($params);

    public function confirmPersonal($params);

    public function getDataService();

    public function getDataIntroduce();

    public function getDataOffer();

    public function getDataOfferConfirm($params);

    public function offerConfirm($params);

    public function createContact($params);

    public function createAgency($params);
}