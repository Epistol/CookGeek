<div class="mb-4 flex justify-center items-center ">
    <div class="  ">
        <a href="{{ route('login.provider', 'google') }}"
           class="">
            <div class="g-signin2">
                {{ __('Google Sign in') }}
            </div>
        </a>
    </div>
    <div class="rounded-full border-gray-300 border-solid border flex justify-center items-center mx-4">
        <a href="{{ route('login.provider', 'facebook') }}" class="button is-round">
    <i class="fab fa-facebook-f"></i>
        </a>
    </div>
    <div class="rounded-full border-gray-300 border-solid border flex justify-center items-center mx-4">
        <a href="{{ route('login.provider', 'twitter') }}" class="button is-round">
    <i class="fab fa-twitter"></i>
            </a>
    </div>
    <div class="rounded-full border-gray-300 border-solid border flex justify-center items-center mx-4">
        <a href="{{ route('login.provider', 'instagram') }}" class="button is-round">
    <i class="fab fa-instagram"></i>
            </a>
    </div>
</div>

<div class="is-divider" data-content="OU"></div>