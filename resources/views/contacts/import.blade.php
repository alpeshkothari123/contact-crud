<!DOCTYPE html>
<html>
<head>
    <title>Import Contacts from XML</title>
</head>
<body>
    <h1>Import Contacts (XML)</h1>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('contacts.import') }}" enctype="multipart/form-data">
        @csrf
        <label>Select XML file:</label><br>
        <input type="file" name="xml_file" required><br><br>

        <button type="submit">Import</button>
    </form>
    <br>
    <a href="{{ route('contacts.index') }}">Back to List</a>
</body>
</html>
