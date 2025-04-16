<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #ffffff;
        }
        h1 {
            color: #dd9323;
            margin-top: 0;
        }
        .details {
            margin-top: 20px;
        }
        .detail-row {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            width: 80px;
        }
        .message-content {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
            border-left: 3px solid #dd9323;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Contact Form Submission</h1>
        <div class="details">
            <div class="detail-row">
                <span class="label">Name:</span> {{ $data['name'] }}
            </div>
            <div class="detail-row">
                <span class="label">Email:</span> <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a>
            </div>
            <div class="detail-row">
                <span class="label">Subject:</span> {{ $data['subject'] }}
            </div>
            <div class="detail-row">
                <span class="label">Message:</span>
                <div class="message-content">
                    {!! nl2br(e($data['message'])) !!}
                </div>
            </div>
        </div>
    </div>
</body>
</html>