<?php


namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected $request;

    protected $builder;

    /**
     * QueryFilter constructor.
     *
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * Apply filter specified by user
     *
     * @param $builder
     * @return mixed
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $filter => $value)
        {
          if(method_exists($this, $filter))
          {
              call_user_func_array([$this, $filter], array_filter([$value]));
          }
        }
        return $this->builder;
    }


    /**
     * Get all request values
     *
     * @return array
     */
    public function filters()
    {
        return $this->request->all();
    }

}
