<?php

namespace App\Http\Controllers;
use App\Models\Rental;
use App\Models\RentalImage;
use App\Models\TemporaryImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class RentalController extends Controller
{

    public function index(Request $request)
{

    $user = auth()->user();

    if ($user->role === 'renter') {
        // Fetch rentals that belong to the logged-in user
        $rentals = Rental::where('renter_id', $user->id)
            ->with('images') // Include the images relationship
            ->get();
    } elseif ($user->role === 'user') {
        // Fetch rentals where status is 'available'
        $rentals = Rental::where('status', 'available')
            ->with('images') // Include the images relationship
            ->get();
    } elseif ($user->role === 'admin') {
        // Fetch all rentals regardless of their status
        $rentals = Rental::with('images') // Include the images relationship
            ->get();
    } else {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    return response()->json([
        'message' => 'Rentals retrieved successfully!',
        'data' => $rentals,
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
        'status' => 'sometimes|string|in:available,reserved,maintenance',
        'customer_id' => 'nullable|exists:users,id', // Must be a valid user if provided
    ]);

    // Check if the status is being set to "reserved"


    if ($request->status === 'reserved' && !$request->customer_id) {
        return response()->json([
            'message' => 'Customer ID is required when setting status to "reserved".'
        ], 422);
    }

    // Handle status and customer ID
    if ($request->status === 'reserved') {
        $validated['customer_id'] = $request->customer_id; // Set customer
    } elseif ($request->status !== 'reserved') {
        $validated['customer_id'] = null; // Clear customer ID if status changes to non-reserved
    }

    $user = auth()->user();


    if($user->role === 'user'){
        return response()->json(['message' => 'Unauthorized'], 403);
    }
    // Update rental
    $rental->update($validated);

    return response()->json([
        'message' => 'Rental updated successfully!',
        'data' => $rental
    ]);
}


    public function show(Rental $rental){
        // dd($rental['customer_id']);
        $customerName = User::where('id', $rental['customer_id'])->value('name');
        // dd($customer);
        return response()->json([
            'message' => 'Rental retrieved successfully!',
            'data' => $rental->load('images'),
            'customerName' => $customerName
        ]);
    }

    public function myRents($userId)
    {
        // dd($userId);
        $rentals = Rental::where('customer_id', $userId)->get()->load('images');

        return response()->json($rentals);
    }

    public function terminateDeal(Request $request, Rental $rental)
    {

        // dd(auth()->id());
        // Ensure the authenticated user is the customer
        if ($rental->customer_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Update the rental status and remove the customer ID
        $rental->update([
            'status' => 'available',
            'customer_id' => null,
        ]);

        return response()->json(['message' => 'Deal terminated successfully']);
    }

}
