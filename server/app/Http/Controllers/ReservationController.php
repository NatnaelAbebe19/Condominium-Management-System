<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Notifications\ReservationRequestNotification;
use Illuminate\Support\Facades\Log;
class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        try{

        $validated = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
        ]);
        // dd($validated);
        $user = auth()->user();

        $reservation = Reservation::create([
            'rental_id' => $validated['rental_id'],
            'user_id' => $user->id,
            'status' => 'pending',
        ]);
        $rental = Rental::find($validated['rental_id']);
        $renter = $rental->renter;
        // Log::info($renter);
        // dd($renter);
        // Send notification to the renter
        $renter->notify(new ReservationRequestNotification($reservation));

        return response()->json(['message' => 'Reservation request sent successfully', 'data' => $reservation], 201);
    }catch(\Exception $e){
        return response()->json(['message' => 'Error creating reservation', 'error' => $e->getMessage()], 500);
    }
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,denied',
            'user_id' => 'required|exists:users,id', // Validate the user ID
        ]);

        $reservation->update([
            'status' => $validated['status'],
        ]);

        if ($validated['status'] === 'approved') {
            $rental = $reservation->rental;
            $rental->update([
                'customer_id' => $validated['user_id'],
                'status' => 'reserved',
            ]);
        }

        return response()->json(['message' => 'Reservation status updated successfully', 'data' => $reservation]);
    }
}
