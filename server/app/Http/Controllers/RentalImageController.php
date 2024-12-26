<?php

namespace App\Http\Controllers;

use App\Models\RentalImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class RentalImageController extends Controller
{
    public function store(Request $request){
        // dd($request->all());

        try{

        $fields = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:10240', // 10MB
        ]);

        $path = $request->file('image')->store('rental_images', 'public');

        RentalImage::create([
            'rental_id' => $fields['rental_id'],
            'image' => $path,
        ]);

        return response()->json(['message' => 'Image uploaded successfully'], 200);

    }catch (\Exception $e) {
        return response()->json(['message' => 'Error uploading image', 'error' => $e->getMessage()], 500);
    }
}

    public function destroy(RentalImage $rentalImage){
        try {
            // Delete the image file from the storage
            Storage::disk('public')->delete($rentalImage->image);

            // Delete the image record from the database
            $rentalImage->delete();

            return response()->json(['message' => 'Image deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting image', 'error' => $e->getMessage()], 500);
        }
    }

}
