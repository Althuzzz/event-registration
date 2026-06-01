<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f3f4f6; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { background: white; padding: 36px; border-radius: 12px; width: 100%; max-width: 480px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        h2 { font-size: 22px; margin-bottom: 24px; color: #111; }
        label { font-size: 13px; font-weight: 600; color: #374151; display: block; margin-bottom: 6px; }
        input { width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 14px; margin-bottom: 6px; }
        input:focus { outline: none; border-color: #4f46e5; box-shadow: 0 0 0 3px rgba(79,70,229,0.1); }
        .field { margin-bottom: 18px; }
        .error { color: #dc2626; font-size: 12px; margin-top: 4px; }
        button { width: 100%; padding: 12px; background: #4f46e5; color: white; border: none; border-radius: 8px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 6px; }
        button:hover { background: #4338ca; }
        .success { background: #d1fae5; color: #065f46; padding: 14px; border-radius: 8px; margin-bottom: 22px; font-size: 14px; }
        .optional { font-weight: 400; color: #9ca3af; font-size: 12px; margin-left: 4px; }
    </style>
</head>
<body>
<div class="card">

    <h2>Event Registration</h2>

    @if(session('success'))
        <div class="success">✓ {{ session('success') }}</div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <div class="field">
            <label>Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="John Smith">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="field">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com">
            @error('email') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="field">
            <label>Phone <span class="optional">(optional)</span></label>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+971 50 000 0000">
            @error('phone') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="field">
            <label>Event Name</label>
            <input type="text" name="event_name" value="{{ old('event_name') }}" placeholder="e.g. Dubai Tech Summit">
            @error('event_name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit">Register Now</button>

    </form>
</div>
</body>
</html>