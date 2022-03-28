<?php

namespace App\Http\Controllers\Statistic;

use App\Http\Controllers\Controller;
use App\Models\PixelEvent;
use App\Models\PixelEventType;
use App\Models\PixelVisit;
use Illuminate\Http\Request;

class PixelController extends Controller
{

    public function setVisit(Request $request)
    {
        $validatedData = $request->validate([
            'ip' => ['required'],
            'user_agent' => ['required'],
            'source' => ['required'],
        ]);

        $visit = new PixelVisit();
        $visit->ip = $validatedData['ip'];
        $visit->user_agent = $validatedData['user_agent'];
        $visit->source = $validatedData['source'];
        $visit->save();

        return response()->json([
            'visit_id' => $visit->id
        ], 201);

    }

    public function setEvent(Request $request)
    {
        $validatedData = $request->validate([
            'visit_id' => ['required'],
            'event_name' => ['required'],
            'value' => ['nullable'],

        ]);

        $visit = PixelVisit::where('id', $validatedData['visit_id'])->first();

        if (!$visit) {
            return response()->json([
                'message' => 'Visit not found.'
            ], 404);
        }

        $eventType = PixelEventType::where('name', $validatedData['event_name'])->first();

        if (!$eventType) {
            return response()->json([
                'message' => 'Event Type not found'
            ], 404);
        }

        //тут должна быть валидация на обязательные поля

        $event = new PixelEvent();
        $event->event_type_id = $eventType->id;
        $event->visit_id = $visit->id;
        //$event->value = $validatedData['value']; в зависимости от того пройдет ли валидацию и наличия поля

        $event->save();

        return response()->json([
            'message' => 'Created'
        ], 201);

    }

}
