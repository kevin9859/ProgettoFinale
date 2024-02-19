<x-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 mx-auto text-center">
                <img src="{{ Auth::user()->profile_picture }}" class="rounded-circle img-fluid" alt="Profile Picture">
                <h2 class="mt-3">{{ Auth::user()->name }}</h2>
                <p class="text-secondary">{{ Auth::user()->email }}</p>
                <p class="text-muted">{{ Auth::user()->bio }}</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Posts</h5>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Posts</h5>
                                @foreach(Auth::user()->posts as $post)
                                    <p>{{ $post->title }}</p>
                                    <p>{{ $post->body }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Followers</h5>
                        <!-- Qui puoi inserire i follower dell'utente -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Following</h5>
                        <!-- Qui puoi inserire chi sta seguendo l'utente -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-layout>