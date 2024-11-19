<section class="success-stories py-5 bg-light">
  <div class="container text-center">
    <h2 class="mb-4 text-danger"> قصص نجاح مراجعينا</h2>
    <div class="row justify-content-center">
      <div class="col-md-6 col-sm-12 mb-4">
        <div class="story-card">
          <a href="{{ asset('assets_land/img/story1.jpg')}}" class="image-link" data-bs-toggle="modal" data-bs-target="#imageModal">
            <img src="{{ asset('assets_land/img/story1.jpg')}}" class="img-fluid rounded shadow" style="max-width: 80%;" alt="Story 1">
          </a>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 mb-4">
        <div class="story-card">
          <a href="{{ asset('assets_land/img/story2.jpg')}}" class="image-link" data-bs-toggle="modal" data-bs-target="#imageModal">
            <img src="{{ asset('assets_land/img/story2.jpg')}}" class="img-fluid rounded shadow" style="max-width: 80%;" alt="Story 2">
          </a>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 mb-4">
        <div class="story-card">
          <a href="{{ asset('assets_land/img/story3.jpg')}}" class="image-link" data-bs-toggle="modal" data-bs-target="#imageModal">
            <img src="{{ asset('assets_land/img/story3.jpg')}}" class="img-fluid rounded shadow" style="max-width: 80%;" alt="Story 3">
          </a>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 mb-4">
        <div class="story-card">
          <a href="{{ asset('assets_land/img/story4.jpg')}}" class="image-link" data-bs-toggle="modal" data-bs-target="#imageModal">
            <img src="{{ asset('assets_land/img/story4.jpg')}}" class="img-fluid rounded shadow" style="max-width: 80%;" alt="Story 4">
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body p-0">
          <img id="modalImage" src="" class="img-fluid w-100 rounded">
        </div>
        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    </div>
  </div>
</section>

<script>
  const modal = document.getElementById('imageModal');
  const modalImage = document.getElementById('modalImage');

  modal.addEventListener('show.bs.modal', function (event) {
    const link = event.relatedTarget;
    const imageSrc = link.getAttribute('href');
    modalImage.src = imageSrc;
  });
</script>
