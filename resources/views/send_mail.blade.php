<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
</head>
<body>
    <h2>Send an Email</h2>
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
    <form action="{{ route('send.email') }}" method="POST">
        @csrf
        <label>Recipient Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <label>Name:</label>
        <input type="text" name="name" required>
        <br><br>
        <label>Message:</label>
        <textarea name="message" required></textarea>
        <br><br>
        <button type="submit">Send Email</button>
    </form>
</body>
</html>
