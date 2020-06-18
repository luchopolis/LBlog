<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class BaseQuery{

    public $table;
    public function __construct($table)
    {
        $this->table = DB::table($table);
    }

    public function getResult(){
        return $this->table->get();
    }
    public function DoJoin($FTable,$FColumn,$operator,$SColumn){
       $this->table->join($FTable,$FColumn,$operator,$SColumn);
    }

    public function WhereCondition($FColumn,$operator,$value){
        $this->table->where($FColumn,$operator,$value);
    }
}

?>
