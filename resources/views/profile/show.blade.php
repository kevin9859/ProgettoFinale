<x-layout-profile>
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card-profilo d-flex flex-column align-items-center">
                    <div class="mb-5 w-100 d-flex flex-column align-items-center">
                        <img src="{{ asset('images/' . (Auth::user()->profile_photo_path ?? 'default-image.jpg')) }}" alt="Profile Image" class="rounded-circle mb-3 mt-5" style="width: 100px; height:100px;">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('profile.edit', ['id' => Auth::id()]) }}" class="btn btn-primary mb-2 mr-2">Modifica Profilo</a>
                            @if ($user->isFollowing(Auth::user()))
                                <form action="{{ route('unfollow', $user->id) }}" method="POST" class="mb-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary">Unfollow</button>
                                </form>
                            @else
                                <form action="{{ route('follow', $user->id) }}" method="POST" class="mb-2">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Follow</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <p><strong>Bio:</strong> {{ Auth::user()->bio }}</p>
                        <p><strong>Date of Birth:</strong> {{ Auth::user()->date_of_birth }}</p>
                        <p><strong>Phone Number:</strong> {{ Auth::user()->phone_number }}</p>
                        <p><strong>Website:</strong> {{ Auth::user()->website }}</p>
                        <p><strong>Profession:</strong> {{ Auth::user()->profession }}</p>
                        <p><strong>Interests:</strong> {{ Auth::user()->interests }}</p>
                        <p><strong>Location:</strong> {{ Auth::user()->location }}</p>
                        <p><strong>Facebook:</strong> {{ Auth::user()->facebook }}</p>
                        <p><strong>Twitter:</strong> {{ Auth::user()->twitter }}</p>
                        <p><strong>Instagram:</strong> {{ Auth::user()->instagram }}</p>
                        <p><strong>LinkedIn:</strong> {{ Auth::user()->linkedin }}</p>
                    </div>
                    <h5 class="card-title">Posts</h5>
                    <div class="d-flex flex-wrap">
                        @foreach(Auth::user()->articles as $article)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $article->title }}</h5>
                                    <p class="card-text">{{ $article->content }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $article->created_at }}</small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-profile>