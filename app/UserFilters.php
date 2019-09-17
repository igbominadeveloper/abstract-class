<?php


namespace App;


class UserFilters extends QueryFilter
{
    public function oldest($order='desc')
    {
        return $this->builder->orderBy('age', $order);
    }

    public function status($status='alive')
    {
        return $this->builder->where('status', $status);
    }

    public function take($limit = 5)
    {
        return $this->builder->take($limit);
    }
}
