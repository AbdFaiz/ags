<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 15px; text-align: center; }
        .content { padding: 20px; }
        .footer { margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Contact Form Submission</h2>
        </div>
        
        <div class="content">
            <p><strong>From:</strong> {{ $data['name'] }} ({{ $data['email'] }})</p>
            <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
            
            <h4>Message:</h4>
            <p>{{ $data['message'] }}</p>
        </div>
        
        <div class="footer">
            <p>This email was sent from your website contact form.</p>
        </div>
    </div>
</body>
</html>