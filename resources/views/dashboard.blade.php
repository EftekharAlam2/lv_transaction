<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Transaction Form</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <form action="{{ route('submitTransaction') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
