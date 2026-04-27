<h2>Tiket Event Kamu</h2>

<p>Halo {{ $participant->nama }},</p>

<p>Berikut tiket kamu untuk event:</p>

<strong>{{ $event->title }}</strong>

<br><br>

<img src="{{ asset('storage/' . $participant->qr_code) }}" width="200">

<p>QR Token:</p>
<p>{{ $participant->qr_token }}</p>

<p>Silakan tunjukkan QR ini saat check-in.</p>