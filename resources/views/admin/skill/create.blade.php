@extends('layouts.master')

@section('title')
{{ isset($skill) ? 'Edit' : 'Add' }} Skill
@endsection

@section('content')
@include('admin.components.alert')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($skill) ? 'Edit' : 'Add' }} Skill</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Skill</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ isset($skill) ? 'Edit' : 'Add' }} Skill</h3>
          </div>

          <form action="{{ isset($skill) ? route('skill.update', $skill->id) : route('skill.store') }}" method="POST">
            @csrf
            @if(isset($skill))
            @method('PUT')
            @endif

            <div class="card-body">
              {{-- Name --}}
              <div class="form-group">
                <label for="name">Skill Name</label>
                <input type="text" name="name" id="name" class="form-control"
                  value="{{ old('name', $skill->name ?? '') }}" required>
              </div>

              {{-- Description --}}
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control"
                  required>{{ old('description', $skill->description ?? '') }}</textarea>
              </div>

              {{-- Icon --}}
              <div class="form-group">
                <label for="icon">Font Awesome Icon</label>
                <div class="input-group">
                  <input type="text" name="icon" id="icon" class="form-control"
                    value="{{ old('icon', $skill->icon ?? '') }}" placeholder="Select an icon..." readonly required>
                  <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#iconModal">
                      Choose Icon
                    </button>
                  </div>
                </div>
                <div class="mt-2">
                  <i id="icon-preview" class="{{ old('icon', $skill->icon ?? '') }}" style="font-size: 2rem;"></i>
                </div>
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">
                {{ isset($skill) ? 'Update' : 'Submit' }}
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- Icon Picker Modal -->
<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="iconModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="iconModalLabel">Select a Font Awesome Icon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
        <div class="row" id="icon-list">
          {{-- Icons will be loaded here --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@push('js')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<script>
  const iconList = document.getElementById('icon-list');
  const iconInput = document.getElementById('icon');
  const iconPreview = document.getElementById('icon-preview');

  // ✅ Fetch icons from Font Awesome GitHub metadata
  fetch('https://raw.githubusercontent.com/FortAwesome/Font-Awesome/master/metadata/icons.json')
    .then(response => response.json())
    .then(data => {
      // Loop through icon keys
      Object.keys(data).forEach(iconKey => {
        const styles = data[iconKey].styles;  // solid, regular, brands etc.

        styles.forEach(style => {
          if (style === 'solid' || style === 'brands') {
            const className = `fa-${style} fa-${iconKey}`;

            const col = document.createElement('div');
            col.classList.add('col-2', 'text-center', 'mb-4');
            col.innerHTML = `
              <i class="${className}" 
                style="font-size: 2rem; cursor: pointer;" 
                data-icon="${className}">
              </i>
            `;
            iconList.appendChild(col);
          }
        });
      });
    })
    .catch(err => {
      console.error('Error loading icons:', err);
      iconList.innerHTML = '<p class="text-danger text-center">Failed to load icons 😢</p>';
    });

  // 🖱️ Handle icon click
  iconList.addEventListener('click', e => {
    const selectedIcon = e.target.getAttribute('data-icon');
    if (selectedIcon) {
      iconInput.value = selectedIcon;
      iconPreview.className = selectedIcon;
      $('#iconModal').modal('hide');
    }
  });
</script>
@endpush

@push('jsasif')
<!-- ✅ Include Font Awesome 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<script>
  // List of Font Awesome icons (you can add more if you want)
  const icons = [
    'fa-solid fa-star', 'fa-solid fa-user', 'fa-solid fa-heart', 'fa-solid fa-code', 'fa-solid fa-laptop-code',
    'fa-solid fa-database', 'fa-solid fa-camera', 'fa-solid fa-gear', 'fa-solid fa-bug', 'fa-solid fa-rocket',
    'fa-solid fa-pen', 'fa-solid fa-brush', 'fa-solid fa-chart-line', 'fa-solid fa-lock', 'fa-solid fa-music',
    'fa-solid fa-cloud', 'fa-solid fa-wifi', 'fa-solid fa-lightbulb', 'fa-solid fa-gamepad', 'fa-solid fa-bolt',
    'fa-solid fa-crown', 'fa-solid fa-globe', 'fa-solid fa-layer-group', 'fa-solid fa-paper-plane', 'fa-solid fa-terminal',
    'fa-brands fa-laravel', 'fa-brands fa-php', 'fa-brands fa-js', 'fa-brands fa-react', 'fa-brands fa-node-js',
    'fa-brands fa-vuejs', 'fa-brands fa-angular', 'fa-brands fa-python', 'fa-brands fa-git', 'fa-brands fa-github',
    'fa-brands fa-figma', 'fa-brands fa-adobe', 'fa-brands fa-wordpress', 'fa-brands fa-bootstrap', 'fa-brands fa-html5',
    'fa-brands fa-css3', 'fa-brands fa-sass', 'fa-brands fa-android', 'fa-brands fa-apple', 'fa-brands fa-windows'
  ];

  const iconList = document.getElementById('icon-list');

  // Generate icon grid
  icons.forEach(icon => {
    const col = document.createElement('div');
    col.classList.add('col-2', 'text-center', 'mb-4');
    col.innerHTML = `
      <i class="${icon}" style="font-size: 2rem; cursor: pointer;" data-icon="${icon}"></i>
    `;
    iconList.appendChild(col);
  });

  // Handle icon selection
  iconList.addEventListener('click', (e) => {
    const icon = e.target.getAttribute('data-icon');
    if (icon) {
      document.getElementById('icon').value = icon;
      document.getElementById('icon-preview').className = icon;
      $('#iconModal').modal('hide');
    }
  });
</script>
@endpush