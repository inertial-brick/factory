<!-- resources/views/jso.blade.php -->

<h1>JSON Data</h1>

{{-- Output JSON data --}}
<pre>{{ json_encode($response, JSON_PRETTY_PRINT) }}</pre>
