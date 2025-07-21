@extends('layout/front')

@section('title')
    @lang('Contact')
@endsection

@section('content')

    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>@lang('Contact')</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" style="color: #145c37;">
                        <a href="{{ route('contact') }}" style="color: #145c37;">@lang('Contact')</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>

    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div id="contact-form" class="contact-form">
                        <div id="contactform-error-msg"></div>
                        <form method="post" action="{{ route('contact.store') }}">
                            @method("PUT")
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>@lang('Name'):</label>
                                    <input type="text" name="name" class="form-control" id="Name"
                                           placeholder="Ism & Familiya" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>@lang('Email'):</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                           placeholder="exmple@gmail.com" required>
                                </div>
                                <div class="form-group col-lg-6 col-left-padding">
                                    <label>@lang('Phone Number')</label>
                                    <input type="text" name="phone" class="form-control" id="phnumber"
                                           placeholder="XXX-XX-XXX-XX-XX" required>
                                </div>
                                <div class="textarea col-lg-12">
                                    <label>@lang('Message')</label>
                                    <textarea name="massage" placeholder="Xabar" required></textarea>
                                </div>
                                <div class="col-lg-12">
                                <div class="comment-btn">
                                    <button type="submit" 
                                            class="btn-blue " 
                                            style="background-color: #145c37; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                                        @lang('Send Message')
                                    </button>
                                </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-about footer-margin">
                        <div class="about-logo">
                            <img src="{{$logo ?? '/assets/images/mit/logo6.png'}}" alt="banner" height="80" style="object-fit: contain; width: 50%;">
                        </div>
                        <h4>@lang('Travel With Us')</h4>
                        <p>{{ $description }}</p>
                        <div class="contact-location">
                            <ul>
                                <li><i class="flaticon-maps-and-flags" aria-hidden="true"></i>TOSHKENT SHAHRI, UCHTEPA TUMANI, VATAN МФЙ, 24 MAVZESI, 52-UY, 40-XONADON</li>
                                <li><i class="flaticon-phone-call"></i>+998-99-548-45-55</li>
                                <li><i class="flaticon-mail"></i> <a href="mailto:info@sarbon-trip.uz">info@sarbon-trip.uz</a></li>
                            </ul>
                        </div>
                        <div class="footer-social-links">
                            <ul>
                                <li class="social-icon"><a href="https://t.me/sarbontrip"><i class="fa fa-telegram"
                                                                                   aria-hidden="true"></i></a></li>
                                <li class="social-icon"><a href="https://www.instagram.com/turisttour.uz/"><i class="fa fa-instagram"
                                                                                    aria-hidden="true"></i></a></li>
                                <!-- <li class="social-icon"><a href="{{$youtube}}"><i class="fa fa-youtube" -->
                                                                                  <!-- aria-hidden="true"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="map">
        <div id="map" style="height: 350px; width: 100%;"></div>
    </div>

@endsection