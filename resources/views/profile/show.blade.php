<x-layout-profile>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card-profilo">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-5">
                            <img src="{{ Auth::user()->profile_image }}" alt="Profile Image" class="rounded-circle" style="width: 80px; height: 80px;">
                            <div class="ml-4">
                                <h4>{{ Auth::user()->name }}</h4>
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
                          
                        </div>
                        <h5 class="card-title">Posts</h5>
                        <div class="d-flex flex-wrap">
                            @foreach(Auth::user()->articles as $article)
                                <div class="p-1" style="flex: 1 0 21%; max-width: 21%;">
                                    <img src="{{ $article->image }}" alt="Post Image" style="width: 100%; height: 0; padding-bottom: 100%; background-size: cover; background-position: center;">
                                </div>
                            @endforeach
                            <div class="ml-auto">
                                <button class="btn btn-outline-primary">Follow</button>
                                <button class="btn btn-secondary">Unfollow</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-profile>