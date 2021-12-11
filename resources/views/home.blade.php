<x-app-layout>

          <h1>Better Solutions For Your </h1>
          <h2>We are team of talented designers making websites with Bootstrap</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('user/dashboard') }}" class="btn-get-started scrollto">Get Started</a>
                        @else 
                        <a href="{{ route('login') }}" class="btn-get-started scrollto">Get Started</a>                    
                    @endauth
                @endif
          </div>


</x-app-layout>
