<?php

namespace App\Models;
// require_once 'BaseElement.php';
use Illuminate\Database\Eloquent\Model;

class Job extends Model {
// class Job extends BaseElement {

    // public function __construct($title, $description){
    //     $newTitle = 'Job: '.$title;
    //     // parent::__construct($newTitle, $description);
    //     $this->title = $newTitle;
    // }
        protected $table = 'jobs';

    public function getDurationAsString(){
        $years = floor($this->months/12);
        $extraMonths = $this->months%12;
        return "Job duration: $years years $extraMonths months";
    }
   
}