<?php namespace App\Repositories;

class Repository
{

    public function __get($name)
    {
        if (substr($name, -10) == 'Repository') {
            if (isset($this->$name)) {
                return $this->$name;
            } else {
                $this->$name = $this->makeRepository($name);
                return $this->$name;
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $name
     * @return \App\Repositories\cleanName
     */
    static function makeRepository($name)
    {
        $cleanName = ucfirst($name);
        if (substr($cleanName, -10) != 'Repository') {
            $cleanName .= 'Repository';
        }
        $cleanName = 'App\Repositories\\' . $cleanName;

        if (class_exists($cleanName) && substr($cleanName, -10) == 'Repository') {
            return new $cleanName;
        } else {
            return false;
        }
    }
}
