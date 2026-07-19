@if(session('success'))
    <div class="modal fade" id="flashSuccessModal" tabindex="-1" aria-labelledby="flashSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content flash-success-modal">
                <button type="button" class="flash-success-modal__close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fal fa-times"></i>
                </button>
                <div class="modal-body text-center">
                    <div class="flash-success-modal__icon">
                        <i class="fal fa-check"></i>
                    </div>
                    <h3 class="flash-success-modal__title" id="flashSuccessModalLabel">Success!</h3>
                    <p class="flash-success-modal__text">{{ session('success') }}</p>
                    <button type="button" class="tj-btn-primary" data-bs-dismiss="modal">
                        Close <i class="fal fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .flash-success-modal {
            background-color: var(--tj-theme-secondary);
            border: none;
            border-radius: 0;
            box-shadow: 0 0 40px rgba(255, 255, 255, 0.03);
            padding: 50px 40px;
            position: relative;
        }
        .flash-success-modal__close {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 50%;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            background: -o-linear-gradient(315deg, var(--tj-theme-primary) 16.35%, var(--tj-black-2) 91.35%);
            background: linear-gradient(135deg, var(--tj-theme-primary) 16.35%, var(--tj-black-2) 91.35%);
            color: var(--tj-white);
            font-size: 16px;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }
        .flash-success-modal__close:hover {
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg);
        }
        .flash-success-modal__icon {
            width: 90px;
            height: 90px;
            line-height: 90px;
            margin: 0 auto 25px;
            border-radius: 50%;
            background: -o-linear-gradient(315deg, var(--tj-theme-primary) 16.35%, var(--tj-black-2) 91.35%);
            background: linear-gradient(135deg, var(--tj-theme-primary) 16.35%, var(--tj-black-2) 91.35%);
            color: var(--tj-white);
            font-size: 36px;
        }
        .flash-success-modal__title {
            font-family: var(--tj-ff-heading);
            color: var(--tj-white);
            margin-bottom: 10px;
        }
        .flash-success-modal__text {
            font-family: var(--tj-ff-body);
            color: var(--tj-grey-2);
            margin-bottom: 25px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var flashSuccessModal = new bootstrap.Modal(document.getElementById('flashSuccessModal'));
            flashSuccessModal.show();
        });
    </script>
@endif
