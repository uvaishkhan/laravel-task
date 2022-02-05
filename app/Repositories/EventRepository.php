<?php
namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\EventManagement;
//use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Types\False_;
use Response;
use Log;

class EventRepository
{

    public function create()
    {
        try {
            return $records = new EventManagement();
        } catch (\Exception $err) {
            Log::error('message error in create on EventRepository :' . $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    public function store($request)
    {
        try {                       

            $data = [
                'name' => $request['name'],
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date'],
                'description' => $request['description'],
                'organizer' => $request['organizer'],
                
            ];

            $event = EventManagement::create($data);
            if ($event->exists) {
                return $event;
            } else {
                return false;
            }
                
        } catch (\Exception $err) {
            Log::error('message error in store on EventRepository :' . $err->getMessage());
            return false;
        }
    }    
}

?>
