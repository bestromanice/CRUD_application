<x-app-layout>



    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$post->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="p-4">
                    <div>
                        category: {{$post->category->name}}
                    </div>
                    <div>
                        tags:
                        <div>
                            @foreach ($post->tags as $tag)
                                <div class="card" style="margin-left: 50px;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $tag->name }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        created_at: {{$post->created_at}}
                    </div>
                    <div>
                        updated_at: {{$post->updated_at}}
                    </div>
                </div>

                <div class="p-4">
                    slug: {{$post->slug}}
                </div>

                <div class="p-4">
                    excerpt: {{$post->excerpt}}
                </div>

                <div class="p-4">
                    content: {{$post->content}}
                </div>

                <form method="POST" action="{{ route('comments.store', $post->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="content">Your comment:</label>
                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary p-4">Create</button>
                </form>

                <div class="p-4">
                    Comments:
                @foreach ($post->comments as $comment)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User "{{ $comment->user->name }}" left a comment at {{$comment->created_at}}:</h5>
                            <p class="card-text p-4">{{ $comment->content }}</p>
                        </div>
                    </div>
                @endforeach
                </div>

            </div>
        </div>
    </div>




</x-app-layout>
