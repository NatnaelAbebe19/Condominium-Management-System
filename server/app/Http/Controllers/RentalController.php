<?php

namespace App\Http\Controllers;
use App\Models\Rental;
use App\Models\RentalImage;
use App\Models\TemporaryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class RentalController extends Controller
{

    public function index(Request $request)
{

    $user = auth()->user();
    // dd($user);
    // Check if the user has the renter role
    if ($user->role !== 'renter') {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Fetch rentals that belong to the logged-in user
    $rentals = Rental::where('renter_id', $user->id)
        ->with('images') // Include the images relationship
        ->get();
    // dd($rentals);
    return response()->json([
        'message' => 'Rentals retrieved successfully!',
        'data' => $rentals,
        // 'images' => asset($rentals->images)
    ]);

    // Retrieve query parameters from the frontend
    // // $query = Rental::query();

    // // // Filter by status (e.g., available or not)
    // // if ($request->has('status')) {
    // //     $query->where('status', $request->input('status'));
    // // }

    // // // Filter by price range (optional)
    // // if ($request->has('min_price') && $request->has('max_price')) {
    // //     $query->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
    // // }

    // // // Filter by location (optional)
    // // if ($request->has('location')) {
    // //     $query->where('location', 'like', '%' . $request->input('location') . '%');
    // // }

    // // // Handle pagination
    // // if ($request->has('page')) {
    // //     $page = $request->input('page');
    // //     $rentals = $query->paginate(10, ['*'], 'page', $page);
    // // } else {
    // //     // If no page is provided, return all
    // //     $rentals = $query->paginate(10);
    // // }

    // // Return the rentals as a JSON response
    // return response()->json($rentals);
}

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'bedrooms' => 'required|integer',
                'floor' => 'required|integer',
                'location' => 'required|string|max:255',
                'area' => 'required|numeric|min:1', // Area is now required
                'price' => 'required|numeric|min:0',
                'status' => 'required|string|in:available,maintenance',
                'renter_id' => 'required|exists:users,id', // Ensure renter exists
            ]);

            // Create rental
            $rental = Rental::create([
                'bedrooms' => $validated['bedrooms'],
                'floor' => $validated['floor'],
                'location' => $validated['location'],
                'area' => $validated['area'], // Save area
                'price' => $validated['price'],
                'status' => $validated['status'],
                'renter_id' => $validated['renter_id'],
                'customer_id' => null // Optional: Set customer if provided
            ]);

            // Handle image upload
            if ($request->has('images')) {
                foreach ($request->input('images') as $image) {
                    RentalImage::create([
                        'rental_id' => $rental->id,
                        'image' => $image,
                    ]);
                }
            }

            return response()->json([
                'message' => 'Rental created successfully!',
                'data' => $rental
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while creating the rental: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, Rental $rental)
{
    $validated = $request->validate([
        'bedrooms' => 'sometimes|integer',
        'floor' => 'sometimes|integer',
        'location' => 'sometimes|string|max:255',
        'area' => 'sometimes|numeric|min:1', // Validate area if provided
        'price' => 'sometimes|numeric|min:0',
        'status' => 'sometimes|string|in:available,occupied,maintenance',
        'customer_id' => 'nullable|exists:users,id', // Must be a valid user if provided
    ]);

    // Check if the status is being set to "occupied"


    if ($request->status === 'occupied' && !$request->customer_id) {
        return response()->json([
            'message' => 'Customer ID is required when setting status to "occupied".'
        ], 422);
    }

    // Handle status and customer ID
    if ($request->status === 'occupied') {
        $validated['customer_id'] = $request->customer_id; // Set customer
    } elseif ($request->status !== 'occupied') {
        $validated['customer_id'] = null; // Clear customer ID if status changes to non-occupied
    }

    // Update rental
    $rental->update($validated);

    return response()->json([
        'message' => 'Rental updated successfully!',
        'data' => $rental
    ]);
}


    public function show(Rental $rental){
        return response()->json([
            'message' => 'Rental retrieved successfully!',
            'data' => $rental->load('images') // Include the images relationship
        ]);
    }
}
