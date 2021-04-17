@if(session('msg'))
<div class="alert bg-primary fade in">
<a href="#" class="close" data-dismiss="alert">×</a>
{{ session('msg') }}
</div>
@endif


@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert bg-danger fade in">
<a href="#" class="close" data-dismiss="alert">x</a>
{{ $error }}
</div>
@endforeach
@endif


