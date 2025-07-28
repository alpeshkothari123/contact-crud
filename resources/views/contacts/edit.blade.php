<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('contacts.update', $contact) }}">
        @csrf
        @method('PUT')

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name', $contact->name) }}"><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}"><br><br>

        <button type="submit">Update</button>
    </form>
    <br>
    <a href="{{ route('contacts.index') }}">Back to List</a>
</body>
</html>
