<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Form</title>
<style>
    .form-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .form-group {
        flex: 1;
    }
    .form-group label {
        display: block;
    }
    .form-group select,
    .form-group input[type="text"] {
        width: 100%;
    }
    .form-group.btn {
        flex: auto;
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;
    }
    .form-group.btn input[type="submit"] {
        width: auto;
    }
</style>
</head>
<body>

<div class="form-container">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="province">Province:</label>
        <select id="province" name="province" required>
            <option value="" disabled selected>Select Province</option>
            <!-- Populate dropdown with province options -->
        </select>
    </div>
    <div class="form-group">
        <label for="city">City:</label>
        <select id="city" name="city" required>
            <option value="" disabled selected>Select City</option>
            <!-- Populate dropdown with city options based on selected province -->
        </select>
    </div>
    <div class="form-group btn">
        <input type="submit" value="Upload">
    </div>
</div>

</body>
</html>
