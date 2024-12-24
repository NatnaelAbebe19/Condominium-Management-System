<?php

namespace App\Http\Controllers;

use App\Models\RentalImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
}
