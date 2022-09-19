<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><a href="https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/" target="_blank">NiceAdmin</a></strong>. All Rights Reserved
    </div>

</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@if (session()->has('status'))
<div class="position-absolute bottom-0 end-0" style="z-index: 777;">
    <div class="alert alert-dark bg-dark text-light border-0 alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif