@extends('layouts.app')

@section('content')



<div class="container">

<?php foreach ($posts as $post) :?>
<?= $post; ?>
<br>
<hr>
<?php endforeach ?>

</div>

@endsection