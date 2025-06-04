<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Offers;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function showOffer(){
        return view('addOffer');
    }


    public function addOffer(Request $request){
            // dd($request->file('img'));
        $message = [
            'p_name.required'      => 'Product name is required.',
            'p_name.max'           => 'Product name must not exceed 255 characters.',
            'units.required'       => 'Quantity is required.',
            'units.integer'        => 'Quantity must be a number.',
            'percentage.required'  => 'Percentage is required.',
            'percentage.min'       => 'Percentage must be more than 0%.',
            'status.required'      => 'Product status is required.',
            'status.in'            => 'Status must be either active or inactive.',
            'due_date.date'        => 'Restock date must be a valid date.',
            'due_date.required'    => 'Restock date is required',
            'price.required'       => 'Original price is required.',
            'price.numeric'        => 'Price must be a number.',
            'price_after.numeric'  => 'Discount price must be a number.',
            'description.required' => 'Description is required.',
            'description.max'      => 'Description must not exceed 255 characters.',
            'address.max'          => 'Address must not exceed 255 characters.',
            'img.image'            => 'Image must be a valid image file.',
            'img.mimes'            => 'Only jpg, jpeg, png files are allowed.',
            'img.max'              => 'Image size must not exceed 2MB.',
    ];

        $products= $request->validate([
            'p_name'       => 'required|string|max:255',
            'units'        => 'required|string|min:1',
            'percentage'   => 'required|string|min:1',
            'status'       => 'required|in:active,inactive',
            'due_date'     => 'required|date',
            'price'        => 'required|numeric|min:1',
            'price_after'  => 'required|numeric|min:1|lt:price',
            'description'  => 'required|string|max:255',
            'address'      => 'required|string|max:255',
            'img'          => 'image|mimes:jpg,jpeg,png|max:2048'
        ],$message);

        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('products', 'public'); // 'public' مهم
            $products['img'] = $path;
}



        $vendorId = session('vendor_id');
        if (!$vendorId) {
            return redirect()->route('loginForm')->withErrors(['access' => 'Please log in as a vendor first.']);
        }

        Offers::create([
            'img'         => $path,
            'p_name'      => $products['p_name'],
            'units'       => $products['units'],
            'percentage'  => $products['percentage'],
            'status'      => $products['status'],
            'due_date'    => $products['due_date'],
            'price'       => $products['price'],
            'price_after' => $products['price_after'],
            'description' => $products['description'],
            'address'     => $products['address'],
            'v_id'        => $vendorId
        ]);
        
        
        return $this->viewOffer(); // عشان تعرض الصفحة بالـ offers مباشرة بعد الإضافة
    }



    public function viewOffer() {
        $vendorId = session('vendor_id');
        $vendor = Vendor::find($vendorId); // جِب بيانات البائع
        $offers = Offers::where('v_id', $vendorId)->get();
        return view('vendorHome', compact('vendor', 'offers'));
}





    public function editOffer($id){
        $offer = Offers::find($id);
        return view('edit' , compact('offer'));
}
    public function updateOffer(Request $request, $id){
        $message = [
        'p_name.required' => 'Product name is required.',
        'p_name.max' => 'Product name must not exceed 255 characters.',
        'units.required' => 'Quantity is required.',
        'units.integer' => 'Quantity must be a number.',
        'status.required' => 'Product status is required.',
        'status.in' => 'Status must be either active or inactive.',
        'percentage.required'  => 'Percentage is required.',
        'percentage.min'       => 'Percentage must be more than 0%.',
        'due_date.date' => 'Restock date must be a valid date.',
        'due_date.required' => 'Restock date is required',
        'price.required' => 'Original price is required.',
        'price.numeric' => 'Price must be a number.',
        'price_after.numeric' => 'Discount price must be a number.',
        'description.required' => 'Description is required.',
        'description.max' => 'Description must not exceed 255 characters.',
        'address.max' => 'Address must not exceed 255 characters.',
        'img.image' => 'Image must be a valid image file.',
        'img.mimes' => 'Only jpg, jpeg, png files are allowed.',
        'img.max' => 'Image size must not exceed 2MB.',
    ];  
    
    
    $offer = Offers::find($id);
        $products= $request->validate([
            'p_name'       => 'required|string|max:255',
            'units'        => 'required|integer|min:1',
            'status'       => 'required|in:active,inactive',
            'percentage'   => 'required|string|min:1',
            'due_date'     => 'required|date',
            'price'        => 'required|numeric|min:0',
            'price_after'  => 'required|numeric|min:0',
            'description'  => 'required|string|max:255',
            'address'      => 'nullable|string|max:255',
            'img'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ],$message);
        
        
        if ($request->hasFile('img')) {
            if ($offer->img) {
                Storage::delete($offer->img); // احذف الصورة القديمة
        }
        $products['img'] = $request->file('img')->store('products_img', 'public');

        $offer->update($products);

        }else {
            return redirect()->route('editOffer', $id);
        }
        
return redirect()->route('vendorHome')->with('success', 'Offer updated successfully!');
}



public function deleteOffer($id){
    $offer = Offers::find($id);
    if ($offer->img) {
             Storage::delete($offer->img);
        }
    $offer->delete();
    return redirect()->route('vendorHome')->with('success', 'Offer deleted successfully!');

}
}

