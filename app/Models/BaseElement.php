<?php
namespace App\Models;

require_once 'Printable.php';
use App\Models\Printable;


class BaseElement implements Printable{
    protected $title;
    public $description;
    public $visible =true;
    public $months;

    public function __construct($title, $description){
        $this->title = $title;
        $this->description = $description;
        // $this->visible = $visible;
        // $this->months = $months;
    }
    public function setTitle($t){
        if($t == ''){
            $this->title = 'N/A';
        }else{
            return $this->title = $t;
        }
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDurationAsString(){
        $years = floor($this->months/12);
        $extraMonths = $this->months%12;
        return "$years years $extraMonths months";
    }
    
    public function getDescription(){
        return $this->description;
    }
}