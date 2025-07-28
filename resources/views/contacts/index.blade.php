<!DOCTYPE html>
<html>
<head>
    <title>Contacts List</title>
</head>
<body>
    <h1>Contacts</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('contacts.create') }}">Add New Contact</a> |
    <a href="{{ route('contacts.import.form') }}">Import XML</a>

    <table border="1" cellpadding="10" style="margin-top: 20px;">
        <tr>
            <th>ID</th><th>Name</th><th>Phone</th><th>Actions</th>
        </tr>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                <a href="{{ route('contacts.edit', $contact) }}">Edit</a> |
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this contact?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
