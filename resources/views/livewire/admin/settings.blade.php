@section('title', 'Settings')

<div>
    <div class="bg-light rounded p-4">
        <h4 class="mb-4">Settings</h4>
        
        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item" role="presentation">
                <button 
                    class="nav-link {{ $activeTab === 'about' ? 'active' : '' }}" 
                    wire:click="setTab('about')"
                    type="button"
                    role="tab"
                >
                    <i class="fa fa-info-circle me-2"></i>About Us
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button 
                    class="nav-link {{ $activeTab === 'site-info' ? 'active' : '' }}" 
                    wire:click="setTab('site-info')"
                    type="button"
                    role="tab"
                >
                    <i class="fa fa-globe me-2"></i>Site Info
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button 
                    class="nav-link {{ $activeTab === 'terms' ? 'active' : '' }}" 
                    wire:click="setTab('terms')"
                    type="button"
                    role="tab"
                >
                    <i class="fa fa-file-alt me-2"></i>Terms & Conditions
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- About Us Tab -->
            <div class="tab-pane fade {{ $activeTab === 'about' ? 'show active' : '' }}" role="tabpanel">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="fa fa-info-circle me-2 text-primary"></i>About Us Settings
                        </h5>
                        <form>
                            <div class="mb-3">
                                <label for="about_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="about_title" placeholder="Enter about us title">
                            </div>
                            <div class="mb-3">
                                <label for="about_description" class="form-label">Description</label>
                                <textarea class="form-control" id="about_description" rows="5" placeholder="Enter about us description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="about_mission" class="form-label">Mission</label>
                                <textarea class="form-control" id="about_mission" rows="3" placeholder="Enter mission statement"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="about_vision" class="form-label">Vision</label>
                                <textarea class="form-control" id="about_vision" rows="3" placeholder="Enter vision statement"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i>Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Site Info Tab -->
            <div class="tab-pane fade {{ $activeTab === 'site-info' ? 'show active' : '' }}" role="tabpanel">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="fa fa-globe me-2 text-primary"></i>Site Information
                        </h5>
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="site_name" class="form-label">Site Name</label>
                                    <input type="text" class="form-control" id="site_name" placeholder="Enter site name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="site_tagline" class="form-label">Tagline</label>
                                    <input type="text" class="form-control" id="site_tagline" placeholder="Enter site tagline">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="site_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="site_email" placeholder="Enter contact email">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="site_phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="site_phone" placeholder="Enter phone number">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="site_mobile" class="form-label">Mobile</label>
                                    <input type="text" class="form-control" id="site_mobile" placeholder="Enter mobile number">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="site_address" class="form-label">Address</label>
                                <textarea class="form-control" id="site_address" rows="3" placeholder="Enter full address"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="site_facebook" class="form-label">Facebook URL</label>
                                    <input type="url" class="form-control" id="site_facebook" placeholder="https://facebook.com/...">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="site_twitter" class="form-label">Twitter URL</label>
                                    <input type="url" class="form-control" id="site_twitter" placeholder="https://twitter.com/...">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="site_instagram" class="form-label">Instagram URL</label>
                                    <input type="url" class="form-control" id="site_instagram" placeholder="https://instagram.com/...">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i>Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Terms & Conditions Tab -->
            <div class="tab-pane fade {{ $activeTab === 'terms' ? 'show active' : '' }}" role="tabpanel">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="fa fa-file-alt me-2 text-primary"></i>Terms & Conditions
                        </h5>
                        <form>
                            <div class="mb-3">
                                <label for="terms_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="terms_title" placeholder="Enter terms title">
                            </div>
                            <div class="mb-3">
                                <label for="terms_content" class="form-label">Content</label>
                                <textarea class="form-control" id="terms_content" rows="15" placeholder="Enter terms and conditions content"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="privacy_policy" class="form-label">Privacy Policy</label>
                                <textarea class="form-control" id="privacy_policy" rows="10" placeholder="Enter privacy policy content"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i>Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
