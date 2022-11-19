<script src="{{ asset('assets/js/config.js') }}"></script>
<script src="{{ asset('assets/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>
<script src="{{ asset('assets/vendors/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/anchorjs/anchor.min.js') }}"></script>
<script src="{{ asset('assets/vendors/is/is.min.js') }}"></script>
<script src="{{ asset('assets/vendors/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('assets/vendors/lodash/lodash.min.js') }}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{ asset('assets/vendors/list.js/list.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script>
<script src="{{ asset('assets/vendors/glightbox/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendors/choices/choices.min.js') }}"></script>
<script src="{{ asset('assets/js/flatpickr.js') }}"></script>
<script src="{{ asset('assets/js/request.js') }}"></script>
<script src="{{ asset('assets/js/form.js') }}"></script>
<script src="{{ asset('assets/js/helper.js') }}"></script>
<script src="{{ asset('assets/js/parsley.min.js') }}"></script>
<script src="{{ asset('assets/js/parsley.id.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-toaster.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        var isFluid = JSON.parse(localStorage.getItem('isFluid'));
        var navbarStyle = localStorage.getItem("navbarStyle");

        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }

        if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
        }

        if (navbarStyle && navbarStyle !== 'transparent')
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
    })
</script>
