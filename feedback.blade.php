<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="{{asset('css/FeedBack.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="feedback-container">
        <h1>Your Feedback Matters</h1>
        <p>We value your opinion. Please let us know how we're doing.</p>
        <form id="feedbackForm" method="post" action="{{ route('sendFeedback') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required>
            </div>
            
            <div class="form-group">
                <label>Feedback Category</label>
                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="type" value="vendor" checked>
                        <span class="radio-custom"></span>
                        Vendor
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="type" value="product">
                        <span class="radio-custom"></span>
                        Product
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="type" value="website">
                        <span class="radio-custom"></span>
                        Website
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label>Rating</label>
                <div class="star-rating">
                    <input type="radio" id="star5" name="rate" value="5">
                    <label for="star5"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star4" name="rate" value="4">
                    <label for="star4"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star3" name="rate" value="3">
                    <label for="star3"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star2" name="rate" value="2">
                    <label for="star2"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star1" name="rate" value="1">
                    <label for="star1"><i class="fas fa-star"></i></label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="suggestions">Suggestions or Complaints</label>
                <textarea id="suggestions" name="suggestion" placeholder="Your feedback helps us improve..."></textarea>
            </div>
            
            <button type="submit" class="submit-btn">Submit Feedback</button>
        </form>
        
        <div class="thank-you-message" id="thankYouMessage">
            <i class="fas fa-check-circle"></i>
            <h2>Thank You!</h2>
            <p>We appreciate your feedback.</p>
        </div>
    </div>
    
    {{-- <script src="{{asset('scripts/FeedBack.js')}}"></script> --}}
</body>
</html>