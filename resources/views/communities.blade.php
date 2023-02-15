@foreach ($communities as $community)
<div>
    <h2>{{ $community->title }}</h2>
    <p>{{ $community->description }}</p>
</div>
@endforeach