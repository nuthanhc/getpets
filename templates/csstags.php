
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');

    body {
        background: #edf8f8;
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border-radius: 15px;
    }

    .card-body img {
        border-radius: 7px;
    }

    .nav-item a {
        color: black !important;
    }

    .nav-item a:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        opacity: 0.8;
    }

    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        background-color: #e7e7e7 !important;
        opacity: 0.9;
    }

    .heading {
        background-color: rgba(255, 255, 255, 0.5);
        padding-bottom: 10px;
    }

    .navbar-brand img {
        width: 45px;
        height: 40px;
    }

    .carousel-inner img {
        width: 100%;
        max-height: 650px;
        object-fit: cover;
    }

    .container-footer {
        width: 100%;
    }

    .input-wrapper input {
        width: 180px;
        height: 35px;
        background: #E6E7E8;
        border-radius: 10px;
    }

    .input-wrapper button {
        color: black;
        height: 35px;
        background: #808080;
        border-radius: 25px !important;
    }

    .content_aboutus p {
        padding: 20px;
        font-size: 18px;
    }

    .container_aboutus h2 {
        padding: 20px 0;
        font-size: 24px;
    }

    .form_body_addpets {
        padding: 20px !important;
        background-color: white;
        opacity: 0.9;
        max-width: 600px !important;
        margin: auto !important;
        font-size: 18px;
    }

    .form_body_addpets h3 {
        text-align: center !important;
        font-size: 24px;
    }

    .form_addpets {
        padding: 15px 30px 0 30px;
    }

    /* Responsive Classes */
    @media (max-width: 768px) {
        .navbar-brand img {
            width: 35px;
            height: 30px;
        }

        .carousel-inner img {
            height: auto;
        }

        .container_aboutus h2 {
            font-size: 20px;
        }

        .form_body_addpets {
            font-size: 16px;
            padding: 10px !important;
        }

        .form_body_addpets h3 {
            font-size: 20px;
        }
    }
	@media (max-width: 768px) {
		.navbar{
			display:flex !important;
			justify-content:center !important;
		}
        .nav-pills {
			display:flex !important;
			justify-content:center !important;
            font-size: 12px;
            margin: 0px;
        }

        .nav-pills .nav-link {
            font-size: 14px;
            padding: 10px 10px;
        }

        .dropdown-menu {
            font-size: 14px;
        }
		.heading {
			font-size: 14px;
    	}
		.small {
            font-size: 12px;
        }

        .input-group.col-md-8 {
            width: 100%;
            margin-top: 10px;
        }
    }
</style>

