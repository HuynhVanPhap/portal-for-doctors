<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @if (!blank($doctors))
                @foreach ($doctors as $doctor)
                    <div class="item">
                        <div class="card-doctor">
                            <div class="header">
                                <img src="{{ asset(config('constraint.link.image.avatar').$doctor->image) }}" alt="">
                                <div class="meta">
                                    <a href="#"><span class="mai-call"></span></a>
                                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                </div>
                            </div>
                            <div class="body">
                                <p class="text-xl mb-0">{{ $doctor->name }}</p>
                                <span class="text-sm text-grey">{{ array_search($doctor->speciality, config('constraint.speciality')) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
