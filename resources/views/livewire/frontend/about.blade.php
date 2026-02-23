<div>
<x-page-locator title="About us" :header="$header" />
<div class="content">
    <div class="about-page">
        @if($settings)
            {{-- Intro section --}}
            @if($settings->about_description || $settings->about_heading)
                <div class="about-intro">
                    <span class="about-label">ABOUT MEDIC</span>
                    <h2 class="about-main-heading">{{ $settings->about_heading ?? 'We Collaborate for Better Healthcare' }}</h2>
                    @if($settings->about_description)
                        <div class="about-description">{!! $settings->about_description !!}</div>
                    @endif
                </div>
            @endif

            {{-- Vision / Mission / Core Values tabs --}}
            @if($settings->vision || $settings->mission || $settings->core_values)
                @php
                    $initialTab = $settings->vision ? 'vision' : ($settings->mission ? 'mission' : 'values');
                @endphp
                <div class="tabs-section" x-data="{ active: '{{ $initialTab }}' }">
                    <div class="tabs">
                        @if($settings->vision)
                            <button type="button" class="tab" :class="{ active: active === 'vision' }" @click="active = 'vision'">Our vision</button>
                        @endif
                        @if($settings->mission)
                            <button type="button" class="tab" :class="{ active: active === 'mission' }" @click="active = 'mission'">Our mission</button>
                        @endif
                        @if($settings->core_values)
                            <button type="button" class="tab" :class="{ active: active === 'values' }" @click="active = 'values'">Core Values</button>
                        @endif
                    </div>
                    @if($settings->vision)
                        <div class="tab-content" x-show="active === 'vision'" x-transition style="display: none;">{!! $settings->vision !!}</div>
                    @endif
                    @if($settings->mission)
                        <div class="tab-content" x-show="active === 'mission'" x-transition style="display: none;">{!! $settings->mission !!}</div>
                    @endif
                    @if($settings->core_values)
                        @php
                            $cv = is_string($settings->core_values) ? $settings->core_values : '';
                            $hasHtml = strip_tags($cv) !== $cv;
                            $items = [];
                            if (!$hasHtml && !empty(trim($cv))) {
                                $items = preg_split('/[\n\r,;]+/', $cv, -1, PREG_SPLIT_NO_EMPTY);
                                $items = array_map('trim', array_filter($items));
                            }
                        @endphp
                        <div class="tab-content tab-content-values" x-show="active === 'values'" x-transition style="display: none;">
                            @if(!$hasHtml && !empty($items))
                                <ul class="values-list">
                                    @foreach($items as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @else
                                {!! $cv !!}
                            @endif
                        </div>
                    @endif
                </div>
            @endif

            {{-- Value cards (below Vision/Mission section) --}}
            @php
                $valueCards = $settings->about_value_cards
                    ? (is_string($settings->about_value_cards) ? json_decode($settings->about_value_cards, true) : $settings->about_value_cards)
                    : [];
                $valueCards = is_array($valueCards) ? array_filter($valueCards, fn($c) => !empty($c['name']) || !empty($c['description'])) : [];
            @endphp
            @if(!empty($valueCards))
                <div class="about-values">
                    <span class="about-label">ABOUT MEDIC</span>
                    <h3 class="about-values-heading">{{ $settings->about_values_subheading ?? 'The Hospital That Has a Sincere Heart' }}</h3>
                    <div class="values-grid">
                        @foreach($valueCards as $card)
                            <div class="value-card">
                                <div class="value-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="value-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                @if(!empty($card['name']))
                                    <h4 class="value-title">{{ $card['name'] }}</h4>
                                @endif
                                @if(!empty($card['description']))
                                    <p class="value-desc">{{ $card['description'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
        @if($partners->isNotEmpty())
            <div class="partners-section">
                <h2 class="section-heading" style="text-align:center">Our partners</h2>
                <div class="partners-grid">
                    @foreach($partners as $partner)
                        <div class="partner-item">
                            @if($partner->logo_path)
                                <img src="{{ asset($partner->logo_path) }}" alt="{{ $partner->name ?? 'Partner' }}">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
<style>
.about-page { margin: 40px 0; }
.about-intro { margin-bottom: 48px; text-align: center; max-width: 800px; margin-left: auto; margin-right: auto; }
.about-label { font-size: 0.85rem; font-weight: 600; color: var(--primary); text-transform: uppercase; letter-spacing: 0.05em; }
.about-main-heading { font-size: 2rem; font-weight: 600; margin: 12px 0 20px; line-height: 1.3; }
@media (max-width: 768px) { .about-main-heading { font-size: 1.5rem; } }
.about-description { font-size: 1rem; color: #555; line-height: 1.7; }
.about-values { margin: 56px 0 48px; }
.about-values-heading { font-size: 1.25rem; font-weight: 500; color: #444; margin: 8px 0 32px; }
.values-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 28px; }
.value-card { background: white; border-radius: 16px; padding: 32px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); border-left: 4px solid var(--primary); transition: transform 0.2s, box-shadow 0.2s; }
.value-card:hover { transform: translateY(-6px); box-shadow: 0 12px 40px rgba(244, 111, 88, 0.2); }

.value-icon { width: 56px; height: 56px; border-radius: 14px; background: var(--primary); display: flex; align-items: center; justify-content: center; margin-bottom: 20px; }
.value-svg { width: 28px; height: 28px; color: white; }
.value-title { font-size: 1.15rem; font-weight: 600; margin-bottom: 12px; color: var(--realblack); } 
.value-desc { font-size: 0.95rem; color: #555; line-height: 1.65; margin: 0; }
.tabs-section { margin: 48px 0; padding: 32px; background: linear-gradient(135deg, #fafafa 0%, #f5f5f5 100%); border-radius: 16px; }
.tabs { display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 24px; }
.tab { padding: 8px 24px; border: 2px solid #ddd; background: #fff; border-radius: 8px; cursor: pointer; font-size: 0.95rem; font-weight: 500; transition: all 0.2s; }
.tab:hover { border-color: var(--primary); color: var(--primary); }
.tab.active { background: var(--primary); color: #fff; border-color: var(--primary); }
.tab-content { padding: 24px; background: #fff; border-radius: 12px; line-height: 1.7; color: #555; box-shadow: 0 2px 12px rgba(0,0,0,0.04); }
.tab-content p { margin-bottom: 1em; }
.tab-content p:last-child { margin-bottom: 0; }
.tab-content ul, .tab-content ol { margin: 1em 0; padding-left: 1.5em; }
.tab-content li { margin-bottom: 0.5em; }
.values-list { list-style: none; padding-left: 0; margin: 0; }
.values-list li { position: relative; padding-left: 28px; margin-bottom: 12px; font-size: 1rem; }
.values-list li::before { content: ''; position: absolute; left: 0; top: 8px; width: 8px; height: 8px; border-radius: 50%; background: var(--primary); }
.partners-section { margin-top: 56px; }
.partners-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 20px; place-items: center; }
.partner-item { padding: 16px; background: #f9f9f9; border-radius: 8px; }
.partner-item img { max-width: 100%; max-height: 60px; object-fit: contain; }
</style>
</div>
