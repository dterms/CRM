    <!-- Bootstrap CSS CDN -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     <!-- jQuery CDN - Slim version (=without AJAX) -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
     {{-- DataTable  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">


     <style>
        .in_progress{
            height:40px;
            background-color:#fff;
        }
        .in_progress_bar{
            width:70%; height:100px;
        }
        .form-control:focus {
        box-shadow: none;
        }
        .form-control-underlined {
        border-width: 0;
        border-bottom-width: 1px;
        border-radius: 0;
        padding-left: 0;
        }
        .form-control::placeholder {
        font-size: 0.95rem;
        color: #aaa;
        font-style: italic;
        }
        .track_order{
            color:#fff;
        }
        .all_card_title{
            font-size:25px;
        }
        .invoice_btn{
            background-color:#19AAF8;
            color:#fff;
        }
        .list_image{
            list-style-image:url('{{asset('public/assets/images/list_background_bullet.png')}}');
            text-align:left;
            line-height:50px;
        }
        .take_it_btn{
            color:#fff;
            background-color:#19AAF8;
        }
        .product_image_complete img{
            width:100%;
        }
        .justify div{
        display: flex;justify-content: center;align-items: center;
        }
        .btn-crm{
        background-color:#19AAF8;
        padding:2px 5px;
        color:#fff;
        }
        .hide_opacity{
            opacity:0;
        }
        .simple_btn{
            border:1px solid #ddd;
            padding:4px 6px;
        }
        .price_bold{
            font-size:40px;
            font-weight:900;
            color:#000;
        }
        .upload_img_{
            padding:10px 20px;
            border:1px solid #ddd;
            background-color:#19AAF8;
            color:#fff;
            cursor:pointer;
        }

            /* Extra small devices (phones, 600px and down) */
            @media only screen and (max-width: 768px) {
                    .hide-menu{
                    display: none;
                    }
                    .avatar{
                        display:none;
                    }
            }

            /* Small devices (portrait tablets and large phones, 600px and up) */
            @media only screen and (min-width: 600px) {

            }

            /* Medium devices (landscape tablets, 768px and up) */
            @media only screen and (min-width: 768px) {...}

            /* Large devices (laptops/desktops, 992px and up) */
            @media only screen and (min-width: 992px) {...}

            /* Extra large devices (large laptops and desktops, 1200px and up) */
            @media only screen and (min-width: 1200px) {...}
     </style>
     @stack('styles')
