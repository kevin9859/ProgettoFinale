<x-layout-careers>
  
    <div class="container-fluid">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-lg-5 col-md-8 col-sm-10 m-3">
                <img src="/images/article-careers-image2.png" alt="Descrizione dell'immagine"
                    class="img-fluid card-3">
            </div>
            <div class="col-lg-5 col-md-8 col-sm-10 m-3">
                <div class="form-container">
                    <form class="card-careers text-black bg-white p-5 " action="{{ route('careers.submit') }}" method="post" enctype="multipart/form-data">
          
                        @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label text-start glitch-font">Per quale ruolo ti stai candidando?</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Scegli qui</option>
                            <option value="admin">Amministratore</option>
                            <option value="revisor">Revisore</option>
                            <option value="writer">Redattore</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-start glitch-font">Email</label>
                        <input  name="email"type="email" class="form-control"id="email" value="{{old('email') ?? Auth::user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label text-start glitch-font">Parlaci di te</label>
                        <textarea name="message" id="message" cols="30" rows="7"class="form-control">{{old('message')}}</textarea>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-delete text-white">Invia la candidatura</button>
                    </div>
                </form>
                </div>
           
 
    </x-layout-careers>