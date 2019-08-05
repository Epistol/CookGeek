<div class="flex mb-4 is-multiline">
    <div class="flex-1 is-6 is-flex-center">
        <a href="{{ route('login.provider', 'google') }}"
           class="">
            <div class="g-signin2">
                {{ __('Google Sign in') }}
            </div>
        </a>
    </div>
    <div class="flex-1 is-6 is-flex-center">
        <a href="{{ route('login.provider', 'facebook') }}" class="button facebook">
                                        <span class="icon">
<i class="fab fa-facebook-f"></i>
    </span>
            Facebook</a>
    </div>
    <div class="flex-1 is-6 is-flex-center">
        <a href="{{ route('login.provider', 'twitter') }}" class="button twitter">
                                        <span class="icon">
    <i class="fab fa-twitter"></i>
    </span>
            Twitter</a>
    </div>
    <div class="flex-1 is-6 is-flex-center">
        <a href="{{ route('login.provider', 'instagram') }}" class="button">
                                        <span class="icon">
    <i class="fab fa-instagram"></i>
    </span>
            Instagram</a>
    </div>
</div>

<div class="is-divider" data-content="OU"></div>