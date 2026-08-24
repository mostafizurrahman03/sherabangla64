@extends('layouts.master')

@section('title')
Update Site Settings
@endsection

@section('content')
@include('admin.components.alert')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Update Site Settings</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Settings</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update Site Settings</h3>
          </div>

          <form action="{{ route('settings.update', $setting->id ?? 1) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
              <!-- Basic Info -->
              <h5 class="mb-3 text-primary">Basic Information</h5>
              <div class="form-group">
                <label for="site_title">Site Title<span class="text-danger">*</span></label>
                <input type="text" name="site_title" class="form-control" id="site_title"
                  value="{{ old('site_title', $setting->site_title ?? '') }}" placeholder="Enter site title" required>
              </div>

              <div class="form-group">
                <label for="shortdesc">Short Description</label>
                <textarea name="shortdesc" id="shortdesc" class="form-control" rows="3"
                  placeholder="Enter short site description...">{{ old('shortdesc', $setting->shortdesc ?? '') }}</textarea>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <label>Logo</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="logo" accept="image/*" class="custom-file-input" id="logo">
                      <label class="custom-file-label" for="logo">Choose Logo</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  @if(!empty($setting->logo))
                  <div class="mt-2">
                    <img src="{{ asset($setting->logo) }}" alt="Logo" width="100" class="img-thumbnail">
                  </div>
                  @endif
                </div>

                <div class="col-md-4">
                  <label>Favicon</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="favicon" accept="image/*" class="custom-file-input" id="favicon">
                      <label class="custom-file-label" for="favicon">Choose Favicon</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  @if(!empty($setting->favicon))
                  <div class="mt-2">
                    <img src="{{ asset($setting->favicon) }}" alt="Favicon" width="40" class="img-thumbnail">
                  </div>
                  @endif
                </div>

                <div class="col-md-4">
                  <label>Hero Background</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="hero_bg" accept="image/*" class="custom-file-input" id="hero_bg">
                      <label class="custom-file-label" for="hero_bg">Choose Background</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  @if(!empty($setting->hero_bg))
                  <div class="mt-2">
                    <img src="{{ asset($setting->hero_bg) }}" alt="Hero BG" width="120" class="img-thumbnail">
                  </div>
                  @endif
                </div>
              </div>

              <hr>
              <!-- Feature Product -->
              <h5 class="mt-4 mb-3 text-primary">Feature Product Section</h5>
              <div class="form-group">
                <label for="feature_product_image">Feature Product Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="feature_product_image" accept="image/*" class="custom-file-input"
                      id="feature_product_image">
                    <label class="custom-file-label" for="feature_product_image">Choose image</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                @if(!empty($setting->feature_product_image))
                <div class="mt-2">
                  <img src="{{ asset($setting->feature_product_image) }}" alt="Feature Image" width="120"
                    class="img-thumbnail">
                </div>
                @endif
              </div>

              <hr>
              <!-- Newsletter -->
              <h5 class="mt-4 mb-3 text-primary">Newsletter Section</h5>
              <div class="form-group">
                <label for="newsletter_text">Newsletter Text</label>
                <textarea name="newsletter_text" id="newsletter_text" class="form-control" rows="3"
                  placeholder="Enter newsletter text...">{{ old('newsletter_text', $setting->newsletter_text ?? '') }}</textarea>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label>Newsletter Background</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="newsletter_bg" accept="image/*" class="custom-file-input"
                        id="newsletter_bg">
                      <label class="custom-file-label" for="newsletter_bg">Choose Background</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  @if(!empty($setting->newsletter_bg))
                  <div class="mt-2">
                    <img src="{{ asset($setting->newsletter_bg) }}" alt="Newsletter BG" width="120"
                      class="img-thumbnail">
                  </div>
                  @endif
                </div>

                <div class="col-md-6">
                  <label>Newsletter Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="newsletter_img" accept="image/*" class="custom-file-input"
                        id="newsletter_img">
                      <label class="custom-file-label" for="newsletter_img">Choose Image</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  @if(!empty($setting->newsletter_img))
                  <div class="mt-2">
                    <img src="{{ asset($setting->newsletter_img) }}" alt="Newsletter Image" width="120"
                      class="img-thumbnail">
                  </div>
                  @endif
                </div>
              </div>

              <hr>
              <!-- Call To Action -->
              <h5 class="mt-4 mb-3 text-primary">Call To Action Section</h5>
              <div class="form-group">
                <label for="calltoaction_text">Call To Action Text</label>
                <textarea name="calltoaction_text" id="calltoaction_text" class="form-control" rows="3"
                  placeholder="Enter CTA text...">{{ old('calltoaction_text', $setting->calltoaction_text ?? '') }}</textarea>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label>CTA Background</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="calltoaction_bg" accept="image/*" class="custom-file-input"
                        id="calltoaction_bg">
                      <label class="custom-file-label" for="calltoaction_bg">Choose Background</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  @if(!empty($setting->calltoaction_bg))
                  <div class="mt-2">
                    <img src="{{ asset($setting->calltoaction_bg) }}" alt="CTA BG" width="120" class="img-thumbnail">
                  </div>
                  @endif
                </div>

                <div class="col-md-6">
                  <label>CTA Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="calltoaction_img" accept="image/*" class="custom-file-input"
                        id="calltoaction_img">
                      <label class="custom-file-label" for="calltoaction_img">Choose Image</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  @if(!empty($setting->calltoaction_img))
                  <div class="mt-2">
                    <img src="{{ asset($setting->calltoaction_img) }}" alt="CTA Image" width="120"
                      class="img-thumbnail">
                  </div>
                  @endif
                </div>
              </div>

              <hr>
              <!-- Delivery Charges -->
              <h5 class="mt-4 mb-3 text-primary">Delivery Charges</h5>
              <div class="row">
                <div class="col-md-4">
                  <label for="deliverycharge_inside">Inside City</label>
                  <input type="number" step="0.01" name="deliverycharge_inside" id="deliverycharge_inside"
                    class="form-control"
                    value="{{ old('deliverycharge_inside', $setting->deliverycharge_inside ?? '') }}"
                    placeholder="0.00">
                </div>
                <div class="col-md-4">
                  <label for="deliverycharge_outside">Outside City</label>
                  <input type="number" step="0.01" name="deliverycharge_outside" id="deliverycharge_outside"
                    class="form-control"
                    value="{{ old('deliverycharge_outside', $setting->deliverycharge_outside ?? '') }}"
                    placeholder="0.00">
                </div>
                <div class="col-md-4">
                  <label for="pickup_point">Pickup Point</label>
                  <input type="number" step="0.01" name="pickup_point" id="pickup_point" class="form-control"
                    value="{{ old('pickup_point', $setting->pickup_point ?? '') }}" placeholder="0.00">
                </div>
              </div>

              <hr>
              <!-- Contact Info -->
              <h5 class="mt-4 mb-3 text-primary">Contact & Location</h5>
              <div class="form-group">
                <label for="location">Location</label>
                <textarea name="location" id="location" class="form-control" rows="2"
                  placeholder="Enter full address">{{ old('location', $setting->location ?? '') }}</textarea>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <label for="mail">Email</label>
                  <input type="email" name="mail" class="form-control" id="mail"
                    value="{{ old('mail', $setting->mail ?? '') }}" placeholder="Enter contact email">
                </div>
                <div class="col-md-4">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" class="form-control" id="phone"
                    value="{{ old('phone', $setting->phone ?? '') }}" placeholder="Enter phone number">
                </div>
                <div class="col-md-4">
                  <label for="whatsapp">WhatsApp</label>
                  <input type="text" name="whatsapp" class="form-control" id="whatsapp"
                    value="{{ old('whatsapp', $setting->whatsapp ?? '') }}" placeholder="Enter WhatsApp number">
                </div>
              </div>

              <hr>
              <!-- Social Links -->
              <h5 class="mt-4 mb-3 text-primary">Social Media Links</h5>
              <div class="row">
                <div class="col-md-4">
                  <label for="facebook">Facebook</label>
                  <input type="url" name="facebook" class="form-control"
                    value="{{ old('facebook', $setting->facebook ?? '') }}" placeholder="https://facebook.com/">
                </div>
                <div class="col-md-4">
                  <label for="twitter">Twitter</label>
                  <input type="url" name="twitter" class="form-control"
                    value="{{ old('twitter', $setting->twitter ?? '') }}" placeholder="https://twitter.com/">
                </div>
                <div class="col-md-4">
                  <label for="linkedin">LinkedIn</label>
                  <input type="url" name="linkedin" class="form-control"
                    value="{{ old('linkedin', $setting->linkedin ?? '') }}" placeholder="https://linkedin.com/">
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-md-4">
                  <label for="instagram">Instagram</label>
                  <input type="url" name="instagram" class="form-control"
                    value="{{ old('instagram', $setting->instagram ?? '') }}" placeholder="https://instagram.com/">
                </div>
                <div class="col-md-4">
                  <label for="youtube">YouTube</label>
                  <input type="url" name="youtube" class="form-control"
                    value="{{ old('youtube', $setting->youtube ?? '') }}" placeholder="https://youtube.com/">
                </div>
              </div>

              <hr>
              <!-- Footer -->
              <h5 class="mt-4 mb-3 text-primary">Footer Section</h5>
              <div class="form-group">
                <label for="copyright_text">Copyright Text</label>
                <textarea name="copyright_text" id="copyright_text" class="form-control" rows="2"
                  placeholder="Enter copyright text...">{{ old('copyright_text', $setting->copyright_text ?? '') }}</textarea>
              </div>

            </div>

            <div class="card-footer text-right">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-1"></i> Save Changes
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection