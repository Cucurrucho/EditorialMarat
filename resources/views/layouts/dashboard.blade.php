@extends('layouts.plain')

@section('body')
    <div class="dashboard" v-cloak>
        <drawer>
            <div class="menu">
                @foreach($dashboardItems as $label => $items)
                    @component('components.dashboardListItem', [
                        'label' => $label,
                        'items' => collect($items),
                        'indexLink' => $indexLink ?? false
                    ])
                    @endcomponent
                @endforeach
            </div>
        </drawer>
        <main>
        <div class="container is-fluid">
        @yield('content')
        </div>
        </main>
    </div>
@endsection

