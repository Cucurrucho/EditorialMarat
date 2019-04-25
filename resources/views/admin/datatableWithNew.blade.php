@extends('layouts.dashboard')

@section('title',$title)

@section('content')
	<div>
		@component('components.datatableWithNew')
			@slot('formattersData', $formattersData ?? null)
			@slot('createTitle', $createTitle)
			@slot('buttons', $buttons ?? null)
			@slot('extraSlotView', 'admin.imageManager')
		@endcomponent
	</div>
@endsection
