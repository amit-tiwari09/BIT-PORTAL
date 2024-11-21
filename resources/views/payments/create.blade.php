
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Fees for Semester {{ $semester }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 50px;
            transition: transform 0.2s;
        }
        .container:hover {
            transform: scale(1.02);
        }
        h2 {
            font-weight: 600;
            margin-bottom: 30px;
            color: #007bff;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
            padding: 10px 15px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .spinner-border {
            margin-left: 10px;
        }
        .alert {
            border-radius: 5px;
            margin-bottom: 20px;
        }
        #card-element {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }
        #card-element:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        #card-errors {
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Pay Fees for Semester {{ $semester }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($feeStructure)
        <form action="{{ route('payments.store') }}" method="POST" id="payment-form">
            @csrf

            <input type="hidden" name="student_id" value="{{ Auth::guard('student')->user()->id }}">
            <input type="hidden" name="fee_structure_id" value="{{ $feeStructure->id }}">
            <input type="hidden" name="semester" value="{{ $semester }}">

            <div class="form-group">
                <label for="amount">Amount <i class="fas fa-dollar-sign"></i></label>
                <input type="text" id="amount" name="amount" value="{{ $feeStructure->{'semester'.$semester.'_fee'} }}" readonly class="form-control">
            </div>

            <div class="form-group">
                <label for="card-element">Credit or Debit Card <i class="fas fa-credit-card"></i></label>
                <div id ="card-element" class="form-control"></div>
                <div id="card-errors" role="alert" class="text-danger mt-2"></div>
            </div>

            <button type="submit" class="btn btn-primary btn-block" id="submit-button">Pay <i class="fas fa-arrow-right"></i></button>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="loading-spinner"></span>
        </form>
    @else
        <div class="alert alert-warning">
            <strong>Note:</strong> Fee structure for this semester is not available. Please contact the administration.
        </div>
    @endif
</div>

<a class="btn btn-secondary mt-3" href="{{route('payments.status')}}">
        <i class="fas fa-arrow-left"></i> Go Back
    </a>

<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client
    var stripe = Stripe('pk_test_51QGxsNJEFieUJXaxtmSOOxTZAjYG3ziCv3xFtVhPX16FuZFw9A2VqEyXpgP56vjCM9zudO9wogWzQA6l9pXd6Ot200NW9K2zpT');
    var elements = stripe.elements();

    // Create an instance of the card Element
    var card = elements.create('card');
    // Add an instance of the card Element into the `card-element` div
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Show loading spinner
        document.getElementById('loading-spinner').style.display = 'inline-block';
        document.getElementById('submit-button').disabled = true; // Disable button to prevent multiple submissions

        stripe.createPaymentMethod({
            type: 'card',
            card: card,
        }).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;

                // Hide loading spinner and re-enable button
                document.getElementById('loading-spinner').style.display = 'none ';
                document.getElementById('submit-button').disabled = false;
            } else {
                // Send the payment method ID to your server
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'payment_method_id');
                hiddenInput.setAttribute('value', result.paymentMethod.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        });
    });
</script>
</body>
</html>