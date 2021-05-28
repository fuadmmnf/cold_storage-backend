<?php


namespace App\Repositories\Interfaces;


interface ReceiveRepositoryInterface
{
    public function getRecentReceives();
    public function getReceiveDetails($sr_no);
    public function getRecentReceiveGroups();
    public function getPaginatedReceivesByBookingId($booking_id);
    public function saveReceivegroup(array $request);
    public function getReceiveByGroupId($id);
    public function getReceivesBySearchedQuery($query);

}
