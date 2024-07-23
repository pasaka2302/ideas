<h1>Profile</h1>
@foreach ($info as $info)
    <span>{{ $info['email'] }}</span>
    @if ($info['email'] == 'test@gmail.com')
      <p> {{ "You have succefully logged in" }} </p> 
    @endif
    <hr>
@endforeach




<p>&copy; Copyrights {{ date('Y') }}</p>