<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Offer</title>
    <link rel="stylesheet" href="{{asset('../css/EditProduct.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="edit-container">
        <div class="header">
            <h1><i class="fas fa-edit"></i> Edit Offer </h1>
            <a href="{{route('vendorHome')}}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Products</a>
        </div>
        <form id="productEditForm" method="post" action="{{ route('updateOffer', $offer->o_id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-section">
                <div class="form-group">
                        <label for="AddImage">Product Image</label>
                        @if ($offer->img)
                        <img src="{{ asset('storage/' . $offer->img) }}" alt="Current Product Image" style="width: 150px; height: auto; margin-bottom: 10px;">
                        @endif
                        <input id="file-upload" type="file" name="img">
                        @error('img')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror

                    </div>
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" id="productName" name="p_name" value="{{$offer->p_name}}">
                    @error('p_name')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="productDescription">Description</label>
                    <textarea id="productDescription" name="description" rows="4">{{$offer->description}}</textarea>
                    @error('description')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="vendorDescription">ِِAddress</label>
                    <textarea id="vendorDescription" name="address" rows="3">{{$offer->address}}</textarea>
                    @error('address')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-section">
                <div class="price-row">
                    <div class="form-group">
                        <label for="originalPrice">Original Price ($)</label>
                        <input type="number" id="originalPrice" name="price" value="{{$offer->price}}" min="0" step="0.01">
                        @error('price')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="discountPrice">Discount Price ($)</label>
                        <input type="number" id="discountPrice" name="price_after" value="{{$offer->price_after}}" min="0" step="0.01">
                        @error('price_after')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                        <label for="percentage">Percentage Price (%)</label>
                        <input type="number" id="percentage" name="percentage" value="{{$offer->percentage}}"  min="1">
                        @error('percentage')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                <div class="form-group">
                    <label for="quantity">Quantity in Stock</label>
                    <input type="number" id="quantity" name="units" value="{{$offer->units}}" min="0">
                    @error('units')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dueDate">Restock Due Date</label>
                    <input type="date" id="dueDate" name="due_date" value="{{$offer->due_date}}">
                    @error('due_date')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Product Status</label>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="status" value="{{$offer->status}}" checked>
                            @error('status')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror
                            <span class="radio-custom"></span>
                            Active
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="status" value="{{$offer->status}}">
                            <span class="radio-custom"></span>
                            Inactive
                        </label>
                    </div>
                </div>
            <div class="form-actions">
                <button type="button" class="cancel-btn">Cancel</button>
                <button type="submit" class="save-btn">Save Changes</button>
            </div>
        </form>
    </div>

    {{-- <script src="../scripts/AddProduct.js"></script> --}}
</body>
</html>