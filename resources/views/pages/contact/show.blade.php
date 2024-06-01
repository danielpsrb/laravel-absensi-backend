<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport">
    <title>Contact &mdash; Admin Attendance</title>

    <!-- General CSS Files -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/components.css') }}">

    <!-- Start GA -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
                        <div class="login-brand">
                            Admin Attendance
                        </div>

                        <div class="card card-primary">
                            <div class="row m-0">
                                <div class="col-12 col-md-12 col-lg-5 p-0">
                                    <div class="card-header text-center">
                                        <h4>Contact Us</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-group floating-addon">
                                                <label>Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="far fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <input id="name"
                                                        type="text"
                                                        class="form-control"
                                                        name="name"
                                                        autofocus
                                                        placeholder="Name">
                                                </div>
                                            </div>

                                            <div class="form-group floating-addon">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <input id="email"
                                                        type="email"
                                                        class="form-control"
                                                        name="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control"
                                                    placeholder="Type your message"
                                                    data-height="150"></textarea>
                                            </div>

                                            <div class="form-group text-right">
                                                <button type="submit"
                                                    class="btn btn-round btn-lg btn-primary">
                                                    Send Message
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 p-0">
                                    <div id="map" class="contact-map">
                                        <img src="{{ asset('img/contact.png')}}" width="100" height="100" style="width: 100%; height: auto;" alt="contact Logo" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Admin Attendance 2024
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/utilities-contact.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
