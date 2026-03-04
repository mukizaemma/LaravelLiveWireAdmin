<div>
    {{-- Slider: dynamic, smooth transitions, controls, captions, buttons --}}
    @if($sliders->isNotEmpty())
        <div class="hero-slider slider-fullwidth"
             x-data="{
                 current: 0,
                 total: {{ $sliders->count() }},
                 autoplayInterval: null,
                 startAutoplay() {
                     this.autoplayInterval = setInterval(() => {
                         this.current = (this.current + 1) % this.total;
                     }, 6000);
                 },
                 stopAutoplay() { clearInterval(this.autoplayInterval); },
                 next() { this.current = (this.current + 1) % this.total; this.stopAutoplay(); this.startAutoplay(); },
                 prev() { this.current = (this.current - 1 + this.total) % this.total; this.stopAutoplay(); this.startAutoplay(); }
             }"
             x-init="startAutoplay()"
             @mouseenter="stopAutoplay()"
             @mouseleave="startAutoplay()">
            <div class="hero-slider__wrap">
                @foreach($sliders as $i => $slide)
                    <div class="hero-slide"
                         x-show="current === {{ $i }}"
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0">
                        <div class="hero-slide__img-wrap">
                            <img src="{{ $slide->image_path ? asset($slide->image_path) : '' }}" alt="{{ $slide->title ?? 'Slide' }}" class="hero-slide__img" loading="{{ $i === 0 ? 'eager' : 'lazy' }}">
                        </div>
                        <div class="hero-slide__overlay"></div>
                        <div class="hero-slide__content">
                            @if($slide->caption || $slide->title)
                                <div class="hero-slide__caption">{!! $slide->caption ?: e($slide->title) !!}</div>
                            @endif
                            @if($slide->button_text && $slide->button_url)
                                <a href="{{ $slide->button_url }}" class="hero-slide__btn"
                                   @if(str_starts_with($slide->button_url, 'http')) target="_blank" rel="noopener"
                                   @else wire:navigate @endif>
                                    {{ $slide->button_text }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Prev / Next controls --}}
            @if($sliders->count() > 1)
                <button type="button" class="hero-slider__btn hero-slider__btn--prev" @click="prev()" aria-label="Previous slide">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28"><path d="M15 18l-6-6 6-6"/></svg>
                </button>
                <button type="button" class="hero-slider__btn hero-slider__btn--next" @click="next()" aria-label="Next slide">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28"><path d="M9 18l6-6-6-6"/></svg>
                </button>

                {{-- Dot indicators --}}
                <div class="hero-slider__dots">
                    @foreach($sliders as $i => $slide)
                        <button type="button" class="hero-slider__dot" :class="{ 'hero-slider__dot--active': current === {{ $i }} }" @click="current = {{ $i }}; stopAutoplay(); startAutoplay();" aria-label="Go to slide {{ $i + 1 }}"></button>
                    @endforeach
                </div>
            @endif
        </div>
    @endif

    <div class="content">
    {{-- Welcome message --}}
    @if($settings && ($settings->home_background_image_path || $settings->home_background_text))
        <div class="welcome-section">
            <div class="about-medic">
                @if($settings->home_background_image_path)
                    <div class="cover-img">
                        <img src="{{ asset($settings->home_background_image_path) }}" alt="Welcome">
                    </div>
                @endif
                <div class="about-medic-description">
                    <h3 class="heading">Welcome message</h3>
                    <div class="medic-description">
                        {!! $settings->home_background_text ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Sections using departments and leadership have been temporarily removed
         while we build the new public site. --}}
    </div>

    {{-- Emergency / Call to Action (parallax, full width, outside content) --}}
    @if($settings && (($settings->cta_title ?? $settings->cta_description) || ($settings->phone_urgency ?? $settings->phone_reception) || $settings->email))
        <div class="cta-parallax cta-parallax--fullwidth">
            @if($settings->cta_background_image_path ?? null)
                <div class="cta-parallax__bg" style="background-image: url('{{ asset($settings->cta_background_image_path) }}');"></div>
            @else
                <div class="cta-parallax__bg cta-parallax__bg--fallback"></div>
            @endif
            <div class="cta-parallax__overlay"></div>
            <div class="cta-parallax__content">
                <div class="cta-parallax__inner">
                    @if($settings->cta_title ?? null)
                        <h2 class="cta-parallax__title">{{ $settings->cta_title }}</h2>
                    @endif
                    @if($settings->cta_description ?? null)
                        <div class="cta-parallax__desc">{!! $settings->cta_description !!}</div>
                    @endif
                    <div class="cta-parallax__contacts">
                        @if($settings->phone_urgency ?? $settings->phone_reception)
                            <a href="tel:{{ $settings->phone_urgency ?? $settings->phone_reception }}" class="cta-parallax__contact" title="Call us">
                                <span class="cta-parallax__icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                </span>
                                <span class="cta-parallax__contact-text">
                                    <span class="cta-parallax__label">Call us</span>
                                    <span class="cta-parallax__value">{{ $settings->phone_urgency ?? $settings->phone_reception }}</span>
                                </span>
                            </a>
                        @endif
                        @if($settings->email)
                            <a href="mailto:{{ $settings->email }}" class="cta-parallax__contact" title="Email us">
                                <span class="cta-parallax__icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                </span>
                                <span class="cta-parallax__contact-text">
                                    <span class="cta-parallax__label">Email us</span>
                                    <span class="cta-parallax__value">{{ $settings->email }}</span>
                                </span>
                            </a>
                        @endif
                        {{-- Button removed while only home route is exposed --}}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <style>
/* Hero slider - full viewport, smooth transitions */
.slider-fullwidth { width: 100vw; position: relative; margin-left: calc(50% - 50vw); margin-right: calc(50% - 50vw); left: 0; box-sizing: border-box; margin-bottom: 30px; }
.hero-slider { position: relative; overflow: hidden; }
.hero-slider__wrap { position: relative; width: 100%; min-height: 50vh; height: 85vh; max-height: 900px; }
@media (max-width: 768px) { .hero-slider__wrap { min-height: 40vh; height: 70vh; } }
.hero-slide { position: absolute; inset: 0; width: 100%; height: 100%; }
.hero-slide__img-wrap { position: absolute; inset: 0; overflow: hidden; }
.hero-slide__img {
    width: 100%; height: 100%; object-fit: cover; object-position: center; display: block;
    animation: heroZoom 12s ease-in-out infinite;
}
@keyframes heroZoom {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.08); }
}
.hero-slide__overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.75) 0%, rgba(0,0,0,0.1) 50%, transparent 100%);
    pointer-events: none;
}
.hero-slide__content {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    padding: 0 60px;
    color: #fff;
    max-width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}
@media (max-width: 768px) { .hero-slide__content { padding: 0 24px; } }
.hero-slide__caption {
    font-size: 2.25rem;
    font-weight: 700;
    line-height: 1.3;
    opacity: 0.98;
    margin-bottom: 24px;
    max-width: 720px;
    text-shadow: 0 2px 12px rgba(0,0,0,0.6);
    animation: heroFadeUp 0.6s ease-out;
}
.hero-slide__caption p { margin: 0 0 12px 0; font-size: inherit; font-weight: inherit; }
.hero-slide__caption p:last-child { margin-bottom: 0; }
@media (max-width: 768px) { .hero-slide__caption { font-size: 1.6rem; margin-bottom: 20px; } }
.hero-slide__btn {
    display: inline-flex; align-items: center; padding: 12px 28px;
    background: var(--primary); color: #fff !important;
    font-size: 0.95rem; font-weight: 600; text-decoration: none;
    border-radius: 8px; transition: background 0.3s, transform 0.2s;
}
.hero-slide__btn:hover { background: var(--primary-dark); transform: translateY(-2px); color: #fff !important; }

/* Prev/Next buttons */
.hero-slider__btn {
    position: absolute; top: 50%; transform: translateY(-50%);
    width: 52px; height: 52px; border-radius: 50%;
    background: rgba(255,255,255,0.2); color: #fff; border: none;
    cursor: pointer; display: flex; align-items: center; justify-content: center;
    transition: background 0.3s, transform 0.2s;
    z-index: 10;
}
.hero-slider__btn:hover { background: rgba(255,255,255,0.35); transform: translateY(-50%) scale(1.05); }
.hero-slider__btn--prev { left: 24px; }
.hero-slider__btn--next { right: 24px; }
@media (max-width: 768px) {
    .hero-slider__btn { width: 44px; height: 44px; }
    .hero-slider__btn--prev { left: 12px; }
    .hero-slider__btn--next { right: 12px; }
    .hero-slider__btn svg { width: 22px; height: 22px; }
}

/* Dot indicators */
.hero-slider__dots {
    position: absolute; bottom: 24px; left: 50%; transform: translateX(-50%);
    display: flex; gap: 10px; z-index: 10;
}
.hero-slider__dot {
    width: 10px; height: 10px; border-radius: 50%;
    background: rgba(255,255,255,0.5); border: none;
    cursor: pointer; padding: 0; transition: background 0.3s, transform 0.2s;
}
.hero-slider__dot:hover { background: rgba(255,255,255,0.8); }
.hero-slider__dot--active { background: var(--primary); transform: scale(1.2); }
@keyframes heroFadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.welcome-section { margin: 30px 0; }
.about-medic { display: grid; grid-template-columns: 1fr 1.2fr; column-gap: 40px; align-items: start; }
@media (max-width: 950px) { .about-medic { grid-template-columns: 1fr; } }
.cover-img { width: 100%; height: 400px; border-radius: 8px; overflow: hidden; }
.cover-img img { width: 100%; height: 100%; object-fit: cover; }
.about-medic-description .heading { font-size: 1.4rem; font-weight: 500; margin-bottom: 12px; }
.medic-description { font-size: 0.9rem; color: #555; line-height: 1.6; }
/* CTA Parallax section - full viewport width (edge-to-edge, matches hero slider) */
.cta-parallax--fullwidth {
    width: 100vw;
    max-width: 100vw;
    position: relative;
    left: 0;
    margin-left: calc(50% - 50vw);
    margin-right: calc(50% - 50vw);
    box-sizing: border-box;
}
.cta-parallax {
    position: relative;
    min-height: 420px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    margin: 48px 0;
}
.cta-parallax__bg {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
@media (max-width: 768px) {
    .cta-parallax__bg { background-attachment: scroll; background-position: center center; }
}
.cta-parallax__bg--fallback {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
}
.cta-parallax__overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.55);
    pointer-events: none;
}
.cta-parallax__content {
    position: relative;
    z-index: 2;
    width: 100%;
    padding: 48px 24px;
}
.cta-parallax__inner {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}
.cta-parallax__title {
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    margin: 0 0 20px 0;
    line-height: 1.3;
    text-shadow: 0 2px 12px rgba(0,0,0,0.5);
}
.cta-parallax__desc {
    font-size: 1.05rem;
    color: rgba(255,255,255,0.95);
    line-height: 1.7;
    margin-bottom: 28px;
    width: 100%;
}
.cta-parallax__desc p { margin: 0 0 12px 0; }
.cta-parallax__desc p:last-child { margin-bottom: 0; }
.cta-parallax__contacts {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 28px 40px;
}
.cta-parallax__contact {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px 24px;
    background: rgba(255,255,255,0.1);
    border-radius: 14px;
    text-decoration: none;
    transition: background 0.3s, transform 0.2s, box-shadow 0.3s;
    border: 1px solid rgba(255,255,255,0.15);
    backdrop-filter: blur(8px);
}
.cta-parallax__contact:hover {
    background: rgba(255,255,255,0.18);
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.25);
}
.cta-parallax__icon {
    flex-shrink: 0;
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--primary);
    color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(244,111,88,0.4);
    transition: background 0.2s, transform 0.2s;
}
.cta-parallax__contact:hover .cta-parallax__icon {
    background: var(--primary-dark);
    transform: scale(1.05);
}
.cta-parallax__icon svg { width: 24px; height: 24px; }
.cta-parallax__contact-text { display: flex; flex-direction: column; align-items: flex-start; gap: 2px; }
.cta-parallax__label {
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: rgba(255,255,255,0.8);
}
.cta-parallax__value {
    font-size: 1.15rem;
    font-weight: 600;
    color: #fff;
    text-decoration: none;
    transition: color 0.2s;
}
.cta-parallax__contact:hover .cta-parallax__value { color: #fff; }
.cta-parallax__btn {
    padding: 14px 32px;
    background: var(--primary);
    color: #fff !important;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    border-radius: 8px;
    transition: background 0.3s, transform 0.2s;
}
.cta-parallax__btn:hover { background: var(--primary-dark); transform: translateY(-2px); color: #fff !important; }
@media (max-width: 768px) {
    .cta-parallax { min-height: 380px; margin: 32px 0; }
    .cta-parallax__content { padding: 36px 20px; }
    .cta-parallax__title { font-size: 1.5rem; margin-bottom: 16px; }
    .cta-parallax__desc { font-size: 0.95rem; margin-bottom: 24px; }
    .cta-parallax__contacts { flex-direction: column; gap: 16px; }
    .cta-parallax__contact { width: 100%; max-width: 320px; margin: 0 auto; }
}
.text-center { text-align: center; }
.mt-4 { margin-top: 24px; }
    </style>
</div>
