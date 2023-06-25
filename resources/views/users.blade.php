<ul>
    @foreach($users as $user)
        <li>
            <b>{{ $user->name }}</b>
            <ul>
                <p> posts is: </p>
                @foreach($user->posts as $post)
                    <li>{{ $post->body }}</li>
                @endforeach
            </ul>
            <ul>
                <p> products is: </p>
                @foreach($user->products as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>
        </li>

    @endforeach
</ul>
