<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Repository;

class Controller extends BaseController
{

    private $_repository;

    use DispatchesJobs,
        ValidatesRequests;

    public function __construct(Repository $repository)
    {
        $this->_repository = new $repository;
    }

    public function __get($name)
    {
        if (property_exists(get_class($this), $name)) {
            return $this->$name;    //Property
        } elseif (method_exists(get_class($this), $name)) {
            return $this->$name();  //Method
        } elseif (substr($name, -10) == 'Repository') {
            if (isset($this->$name)) {
                return $this->$name;
            } else {
                $this->$name = $this->_repository->makeRepository($name);
                return $this->$name;
            }
        } else {
            return false;
        }
    }

    public function __set($name, $value)
    {
        if (property_exists(get_class($this), $name) ||
            substr($name, -10) == 'Repository') {
            $this->$name = $value;
        } else {
            throw new \Exception($name . ' is not a property of ' . get_class($this));
        }
    }
}
