<?php

namespace App\Http\Controllers;

use App\Models\EventManagement;
use App\Models\Tickets;
use Illuminate\Http\Request;
use App\Repositories\EventRepository;
use App\Http\Requests\EventsRequest;
use Illuminate\Support\Facades\DB;
use Log;

class EventManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $events;

    public function __construct(EventRepository $events)
    {
        $this->events = $events;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {    
            $data = $this->events->create();       
            return view('events.create', $data);
        } catch (\Exception $err) {
            Log::error('Error in create on EventManagementController :' . $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventsRequest $request)
    {
        
            //    return $request;
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            //return $validated;    
            $events = $this->events->store($validated);
            if ($events) {
                if (!empty($request->ticket)) {
                    $ticket_name = collect($request->ticket['name'])
                        ->reject(function ($ticket_name) {
                            return is_null($ticket_name);
                        });
                    if (!empty($ticket_name)) {

                        $i = 0;
                        $tickets_data = [];
                        foreach ($ticket_name as $tkkey => $tkval) {
                            $price = (isset($request->ticket['price'][$tkkey]) && !empty($request->ticket['price'][$tkkey])) ? $request->ticket['price'][$tkkey] : 0;
                            $tickets_data[] = [
                                'event_management_id' => $events->id,
                                'name' => $tkval,
                                'price' => $price,
                            ];
                            $i++;
                        }
                        $tickets = Tickets::insert($tickets_data);
                    }
                }
                DB::commit();
                return back()->with(['success' => 'Events added successfully.']);
            }
            return back()->with(['error' => 'Event not added.']);
        } catch (\Exception $err) {
            Log::error('Error in Events on EventManagementController :' . $err->getMessage());
            DB::rollBack();
            return back()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventManagement  $eventManagement
     * @return \Illuminate\Http\Response
     */
    public function show(EventManagement $eventManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventManagement  $eventManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(EventManagement $eventManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventManagement  $eventManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventManagement $eventManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventManagement  $eventManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventManagement $eventManagement)
    {
        //
    }
}
