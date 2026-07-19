<!DOCTYPE html>
<html>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>New Contact Message</h2>
    <p>You have received a new message through the contact form.</p>

    <p><strong>Name:</strong> {{ $inbox->firstName }} {{ $inbox->lastName }}</p>
    <p><strong>Email:</strong> {{ $inbox->email }}</p>
    <p><strong>Phone:</strong> {{ $inbox->phone }}</p>
    <p><strong>Service:</strong> {{ $inbox->service }}</p>

    <p><strong>Message:</strong></p>
    <p>{{ $inbox->message }}</p>

    <p>Thanks,<br>{{ config('app.name') }}</p>
</body>
</html>
