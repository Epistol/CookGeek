@extends('layouts.app.app_captcha')
@section('titrepage', 'Contact')

@section('content')

    <div class="container">
        <section class="section blockcontent">

            <h1 class="title">Contact</h1>

            <form class="form-horizontal" method="POST" action="{{ route('contact.store') }}">
                @csrf
                <div class="field">
                    <label class="label">Votre nom / pseudo</label>
                    <div class="control">
                        <input class="input" name="name" type="text" placeholder="Votre nom / pseudo">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Votre Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input " type="email" name="mail" placeholder="Email" value="hello@">
                        <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>

                    </div>
                </div>

                <div class="field">
                    <label class="label">Sujet</label>
                    <div class="control">
                        <input class="input" type="text" name="subject" placeholder="Text input">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Message</label>
                    <div class="control">
                        <textarea class="textarea" name="message" placeholder="Textarea"></textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="g-recaptcha" data-sitekey="6LeVIocUAAAAAIuWi5Hx4evDlY2UrvP_UquIeh2n"></div>

                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button
                                class=" button is-link">
                            Envoyer
                        </button>

                    </div>
                    <div class="control">
                        <button class="button is-text">Annuler</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection