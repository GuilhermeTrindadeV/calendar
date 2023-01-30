<?php

namespace Src\Models;

use Src\Exceptions\ValidationException;
use Src\Models\Model;

class Event extends Model 
{
    protected static $tableName = "eventos";
    protected static $primaryKey = "eve_id";
    protected static $columns = [
        "usu_id",
        "title",
        "description",
        "color",
        "start",
        "end"
    ];

    protected function conectDB() 
    {
        try{
            $conn = DATA_LAYER;
            return $conn;
        } catch(Exception $e) {
            addErrorMsg($e->getMessage());
        }
    }

    public function getEvents()
    {
        $jEvents = [];
        $events = Event::get();
        if($events) {
            foreach($events as $event) {
                $jEvents[] = $event->getValues();
            }
        }

        $jEvents = json_encode($jEvents);
    }
}
