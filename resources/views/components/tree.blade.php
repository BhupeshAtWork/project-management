@props(['downline' => ['No tree found']])

@foreach ($downline as $value)

    <div class="mb-4" style="padding-left: {{ $loop->index * 30 }}px">
        <span class="circle"> {{ $loop->index }} </span>
        {{ $value }} <br>
    </div>

@endforeach
