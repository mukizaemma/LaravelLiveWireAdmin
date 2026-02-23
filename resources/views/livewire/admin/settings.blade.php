@section('title', 'Hospital Settings')

<div>
    <div class="bg-light rounded p-4">
        <h4 class="mb-4">Hospital Settings</h4>

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link {{ $activeTab === 'account' ? 'active' : '' }}"
                    wire:click="setTab('account')"
                    type="button"
                    role="tab"
                >
                    <i class="fa fa-user-circle me-2"></i>Hospital User Account
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link {{ $activeTab === 'contacts' ? 'active' : '' }}"
                    wire:click="setTab('contacts')"
                    type="button"
                    role="tab"
                >
                    <i class="fa fa-phone-alt me-2"></i>Contact Details
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link {{ $activeTab === 'info' ? 'active' : '' }}"
                    wire:click="setTab('info')"
                    type="button"
                    role="tab"
                >
                    <i class="fa fa-hospital me-2"></i>Hospital Info
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link {{ $activeTab === 'headers' ? 'active' : '' }}"
                    wire:click="setTab('headers')"
                    type="button"
                    role="tab"
                >
                    <i class="fa fa-image me-2"></i>Page Headers
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Account Tab -->
            <div class="tab-pane fade {{ $activeTab === 'account' ? 'show active' : '' }}" role="tabpanel">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="fa fa-user-circle me-2 text-primary"></i>Hospital User Account
                        </h5>

                        <form wire:submit.prevent="saveAccount">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input
                                        type="text"
                                        class="form-control @error('account_name') is-invalid @enderror"
                                        wire:model.defer="account_name"
                                    >
                                    @error('account_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input
                                        type="email"
                                        class="form-control @error('account_email') is-invalid @enderror"
                                        wire:model.defer="account_email"
                                    >
                                    @error('account_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input
                                        type="text"
                                        class="form-control @error('account_phone') is-invalid @enderror"
                                        wire:model.defer="account_phone"
                                    >
                                    @error('account_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Biography</label>
                                <textarea
                                    class="form-control summernote @error('account_biography') is-invalid @enderror"
                                    wire:model.defer="account_biography"
                                ></textarea>
                                @error('account_biography')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        New Password
                                        <small class="text-muted">(leave blank to keep current)</small>
                                    </label>
                                    <input
                                        type="password"
                                        class="form-control @error('account_password') is-invalid @enderror"
                                        wire:model.defer="account_password"
                                    >
                                    @error('account_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        wire:model.defer="account_password_confirmation"
                                    >
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i>Save Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contacts Tab -->
            <div class="tab-pane fade {{ $activeTab === 'contacts' ? 'show active' : '' }}" role="tabpanel">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="fa fa-phone-alt me-2 text-primary"></i>Contact Details
                        </h5>

                        <form wire:submit.prevent="saveContacts">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">General Email</label>
                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        wire:model.defer="email"
                                    >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Reception Phone</label>
                                    <input
                                        type="text"
                                        class="form-control @error('phone_reception') is-invalid @enderror"
                                        wire:model.defer="phone_reception"
                                    >
                                    @error('phone_reception')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Urgency / Emergency Phone</label>
                                    <input
                                        type="text"
                                        class="form-control @error('phone_urgency') is-invalid @enderror"
                                        wire:model.defer="phone_urgency"
                                    >
                                    @error('phone_urgency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">WhatsApp Number</label>
                                    <input
                                        type="text"
                                        class="form-control @error('phone_whatsapp') is-invalid @enderror"
                                        wire:model.defer="phone_whatsapp"
                                    >
                                    @error('phone_whatsapp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Billing Phone</label>
                                    <input
                                        type="text"
                                        class="form-control @error('phone_billing') is-invalid @enderror"
                                        wire:model.defer="phone_billing"
                                    >
                                    @error('phone_billing')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Restaurant Phone</label>
                                    <input
                                        type="text"
                                        class="form-control @error('phone_restaurant') is-invalid @enderror"
                                        wire:model.defer="phone_restaurant"
                                    >
                                    @error('phone_restaurant')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea
                                    class="form-control summernote @error('address') is-invalid @enderror"
                                    wire:model.defer="address"
                                ></textarea>
                                @error('address')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Google Map Embed URL</label>
                                <textarea
                                    class="form-control @error('map_embed_url') is-invalid @enderror"
                                    wire:model.defer="map_embed_url"
                                    rows="3"
                                    placeholder="Paste the full iframe src URL from Google Maps (Share → Embed a map)"
                                ></textarea>
                                <small class="text-muted">Get this from Google Maps: Share → Embed a map → copy the src URL from the iframe.</small>
                                @error('map_embed_url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i>Save Contacts
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hospital Info Tab -->
            <div class="tab-pane fade {{ $activeTab === 'info' ? 'show active' : '' }}" role="tabpanel">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="fa fa-hospital me-2 text-primary"></i>Hospital Information
                        </h5>

                        <form wire:submit.prevent="saveInfo">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Hospital Name</label>
                                    <input
                                        type="text"
                                        class="form-control @error('company_name') is-invalid @enderror"
                                        wire:model.defer="company_name"
                                    >
                                    @error('company_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Hospital Logo</label>
                                    <input
                                        type="file"
                                        class="form-control @error('logo') is-invalid @enderror"
                                        wire:model="logo"
                                        accept="image/*"
                                    >
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    @if($logo)
                                        <div class="mt-2">
                                            <span class="text-muted small d-block mb-1">Logo preview (new upload):</span>
                                            <img src="{{ $logo->temporaryUrl() }}" alt="Logo preview" class="img-fluid rounded border" style="max-height: 80px;">
                                        </div>
                                    @elseif($logo_path)
                                        <div class="mt-2">
                                            <span class="text-muted small d-block mb-1">Current logo:</span>
                                            <img src="{{ asset($logo_path) }}" alt="Current logo" class="img-fluid rounded border" style="max-height: 80px;">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Home Background Image</label>
                                    <input
                                        type="file"
                                        class="form-control @error('home_background_image') is-invalid @enderror"
                                        wire:model="home_background_image"
                                        accept="image/*"
                                    >
                                    @error('home_background_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    @if($home_background_image)
                                        <div class="mt-2">
                                            <span class="text-muted small d-block mb-1">Background preview (new upload):</span>
                                            <img src="{{ $home_background_image->temporaryUrl() }}" alt="Background preview" class="img-fluid rounded border" style="max-height: 120px;">
                                        </div>
                                    @elseif($home_background_image_path)
                                        <div class="mt-2">
                                            <span class="text-muted small d-block mb-1">Current background image:</span>
                                            <img src="{{ asset($home_background_image_path) }}" alt="Current background" class="img-fluid rounded border" style="max-height: 120px;">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Home Background Text</label>
                                    <textarea
                                        class="form-control summernote @error('home_background_text') is-invalid @enderror"
                                        wire:model.defer="home_background_text"
                                    ></textarea>
                                    @error('home_background_text')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">
                            <h6 class="mb-3"><i class="fa fa-bullhorn me-2 text-primary"></i>Home Page CTA Section (Emergency Contact Block)</h6>
                            <p class="text-muted small mb-3">The call-to-action block on the home page with parallax background. Single title and centered text.</p>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">CTA Background Image</label>
                                    <input
                                        type="file"
                                        class="form-control @error('cta_background_image') is-invalid @enderror"
                                        wire:model="cta_background_image"
                                        accept="image/*"
                                    >
                                    @error('cta_background_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($cta_background_image)
                                        <div class="mt-2">
                                            <span class="text-muted small d-block mb-1">Preview (new upload):</span>
                                            <img src="{{ $cta_background_image->temporaryUrl() }}" alt="CTA preview" class="img-fluid rounded border" style="max-height: 120px;">
                                        </div>
                                    @elseif($cta_background_image_path)
                                        <div class="mt-2">
                                            <span class="text-muted small d-block mb-1">Current background:</span>
                                            <img src="{{ asset($cta_background_image_path) }}" alt="Current CTA background" class="img-fluid rounded border" style="max-height: 120px;">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">CTA Title (single title)</label>
                                    <input type="text" class="form-control @error('cta_title') is-invalid @enderror"
                                           wire:model.defer="cta_title"
                                           placeholder="e.g. Need Emergency Contact? We're Here 24/7">
                                    @error('cta_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">CTA Description</label>
                                    <textarea
                                        class="form-control summernote @error('cta_description') is-invalid @enderror"
                                        wire:model.defer="cta_description"
                                        rows="3"
                                        placeholder="For urgent healthcare needs, our Emergency Contact Information is readily available..."
                                    ></textarea>
                                    @error('cta_description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">
                            <h6 class="mb-3"><i class="fa fa-images me-2 text-primary"></i>External Gallery URL</h6>
                            <p class="text-muted small mb-3">When set, the Gallery menu item will link to this URL (opens in a new tab) instead of the internal gallery page. Leave blank to use the built-in gallery. The internal gallery CRUD remains available in Admin → Gallery.</p>
                            <div class="col-12 mb-3">
                                <label class="form-label">Gallery External URL</label>
                                <input
                                    type="url"
                                    class="form-control @error('gallery_external_url') is-invalid @enderror"
                                    wire:model.defer="gallery_external_url"
                                    placeholder="https://www.flickr.com/photos/your-account/"
                                >
                                @error('gallery_external_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">About Description</label>
                                <textarea
                                    class="form-control summernote @error('about_description') is-invalid @enderror"
                                    wire:model.defer="about_description"
                                ></textarea>
                                @error('about_description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">About Main Heading</label>
                                    <input type="text" class="form-control @error('about_heading') is-invalid @enderror"
                                           wire:model.defer="about_heading" placeholder="e.g. We Collaborate for Better Healthcare">
                                    @error('about_heading') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Values Section Subheading</label>
                                    <input type="text" class="form-control @error('about_values_subheading') is-invalid @enderror"
                                           wire:model.defer="about_values_subheading" placeholder="e.g. The Hospital That Has a Sincere Heart">
                                    @error('about_values_subheading') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label d-flex align-items-center justify-content-between">
                                    <span>About Page – Value Cards</span>
                                    <button type="button" class="btn btn-sm btn-primary" wire:click="addAboutValueCard">
                                        <i class="fa fa-plus me-1"></i> Add Card
                                    </button>
                                </label>
                                <p class="text-muted small mb-2">These cards appear on the About page below the Vision/Mission section. Each has a title and description.</p>
                                @foreach($about_value_cards as $idx => $card)
                                    <div class="card border mb-2" wire:key="about-card-{{ $idx }}">
                                        <div class="card-body py-3">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <strong class="text-muted">Card {{ $idx + 1 }}</strong>
                                                <button type="button" class="btn btn-sm btn-outline-danger" wire:click="removeAboutValueCard({{ $idx }})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control form-control-sm" wire:model.defer="about_value_cards.{{ $idx }}.name"
                                                           placeholder="Title (e.g. Honesty)">
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea class="form-control form-control-sm" wire:model.defer="about_value_cards.{{ $idx }}.description"
                                                              rows="2" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if(empty($about_value_cards))
                                    <div class="card border border-dashed mb-2">
                                        <div class="card-body py-4 text-center text-muted">
                                            <p class="mb-2">No value cards yet.</p>
                                            <button type="button" class="btn btn-sm btn-primary" wire:click="addAboutValueCard">
                                                <i class="fa fa-plus me-1"></i> Add Card
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mission</label>
                                    <textarea
                                        class="form-control summernote @error('mission') is-invalid @enderror"
                                        wire:model.defer="mission"
                                    ></textarea>
                                    @error('mission')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Vision</label>
                                    <textarea
                                        class="form-control summernote @error('vision') is-invalid @enderror"
                                        wire:model.defer="vision"
                                    ></textarea>
                                    @error('vision')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Core Values (list items)</label>
                                <textarea
                                    class="form-control summernote @error('core_values') is-invalid @enderror"
                                    wire:model.defer="core_values"
                                ></textarea>
                                @error('core_values')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Facebook URL</label>
                                    <input
                                        type="url"
                                        class="form-control @error('facebook_url') is-invalid @enderror"
                                        wire:model.defer="facebook_url"
                                    >
                                    @error('facebook_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Instagram URL</label>
                                    <input
                                        type="url"
                                        class="form-control @error('instagram_url') is-invalid @enderror"
                                        wire:model.defer="instagram_url"
                                    >
                                    @error('instagram_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">LinkedIn URL</label>
                                    <input
                                        type="url"
                                        class="form-control @error('linkedin_url') is-invalid @enderror"
                                        wire:model.defer="linkedin_url"
                                    >
                                    @error('linkedin_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">YouTube URL</label>
                                    <input
                                        type="url"
                                        class="form-control @error('youtube_url') is-invalid @enderror"
                                        wire:model.defer="youtube_url"
                                    >
                                    @error('youtube_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">X (Twitter) URL</label>
                                    <input
                                        type="url"
                                        class="form-control @error('x_url') is-invalid @enderror"
                                        wire:model.defer="x_url"
                                    >
                                    @error('x_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Threads URL</label>
                                    <input
                                        type="url"
                                        class="form-control @error('threads_url') is-invalid @enderror"
                                        wire:model.defer="threads_url"
                                    >
                                    @error('threads_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i>Save Hospital Info
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Page Headers Tab -->
            <div class="tab-pane fade {{ $activeTab === 'headers' ? 'show active' : '' }}" role="tabpanel">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title mb-0">
                                <i class="fa fa-image me-2 text-primary"></i>Page Headers
                            </h5>
                            <button
                                type="button"
                                class="btn btn-sm btn-primary"
                                wire:click="saveHeaders"
                            >
                                <i class="fa fa-save me-1"></i>Save All
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Page</th>
                                        <th>Title</th>
                                        <th>Caption</th>
                                        <th>Header Image Path</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($headers as $index => $header)
                                        <tr>
                                            <td>
                                                <span class="fw-semibold">{{ $header['label'] }}</span>
                                                <br>
                                                <small class="text-muted">{{ $header['page_key'] }}</small>
                                            </td>
                                            <td>
                                                <input
                                                    type="text"
                                                    class="form-control form-control-sm"
                                                    wire:model.defer="headers.{{ $index }}.title"
                                                >
                                            </td>
                                            <td>
                                                <textarea
                                                    class="form-control form-control-sm summernote"
                                                    rows="2"
                                                    wire:model.defer="headers.{{ $index }}.caption"
                                                ></textarea>
                                            </td>
                                            <td>
                                                <div class="mb-1">
                                                    <input
                                                        type="file"
                                                        class="form-control form-control-sm @error('headerImages.' . $index) is-invalid @enderror"
                                                        wire:model="headerImages.{{ $index }}"
                                                        accept="image/*"
                                                    >
                                                    @error('headerImages.' . $index)
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                @if(isset($headerImages[$index]) && $headerImages[$index])
                                                    <div class="mt-1">
                                                        <span class="text-muted small d-block mb-1">Preview (new upload):</span>
                                                        <img src="{{ $headerImages[$index]->temporaryUrl() }}" alt="Header preview" class="img-fluid rounded border" style="max-height: 80px;">
                                                    </div>
                                                @elseif(!empty($header['image_path']))
                                                    <div class="mt-1">
                                                        <span class="text-muted small d-block mb-1">Current image:</span>
                                                        <img src="{{ asset($header['image_path']) }}" alt="Header image" class="img-fluid rounded border" style="max-height: 80px;">
                                                    </div>
                                                @else
                                                    <small class="text-muted">No header image set yet.</small>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <p class="text-muted small mb-0">
                            Later you can replace the image path fields with real file uploads using the same structure.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
