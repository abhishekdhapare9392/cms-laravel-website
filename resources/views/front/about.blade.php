@include('layouts.common.header')
<h1>{{ $about->title }}</h1>
<label for="php">PHP</label>
<input type="range" name="" id="php" min="0" max="100" value="95" >
@include('layouts.common.footer')