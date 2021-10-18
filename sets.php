<?php

class Set
{
    /** @var array */
    var $numbers;

    /* @var array */
     var $set1  = [];

    /* @var array */
    var $set2  = [];

    /* @var array */
    var $set3  = [];


     /* @var array */
     var $result  = NULL;

    /**
     * Constructor
     *
     * @param array $messages
     * @return void
     */
    public function __construct(array $set1, array $set2, array $set3 =[])
    {
        $this->set1 = $set1;
        $this->set2  = $set2 ;
        $this->set3  = $set3 ;
    }



    public function getSet(string $set): array
    {
        return $this->{$set};
    }


    public function exists(string $set, int $n) : bool
    {

        if(in_array($n, $this->{$set})){
           return true;
        }
        else
        {
         return false;
        }

    }


    public function addNumber(string $set,  int $n)  : bool
    {

        if(!in_array($n, $this->{$set})){

           array_push($this->{$set}, $n);
           return true;
        }
      else
        {
         return false;
        }
    }

    public function remove(string $set,  int $n): bool
    {
        if(in_array($n, $this->{$set})){

            if (($key = array_search($del_val, $messages)) !== false) {
                unset($messages[$key]);
                return true;
            }
        }
        else
        {
         return false;
        }
    }

    public function union(array $set1, array $set2)
    {
        $this->result = array_intersect($set1, $set2);
    }

    public function intersection(array $set1, array $set2)
    {
        $this->result = array_unique(array_merge($set1, $set2));
    }

    public function printSet()
    {
        return $this->result;
    }

}
