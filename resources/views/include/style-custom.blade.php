<link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('css/owl.theme.default.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
<style>
    .line-custom {
        position: relative;
        width: 250px;
        height: 3px;
        background-color: #212529;
        margin: 20px;
    }
    .rectangle-custom {
        position: absolute;
        top: -2px; /* (7px - 3px) / 2 = 2px untuk menyelaraskan vertikal */
        left: 90px; /* (250px - 70px) / 2 = 35px untuk menyelaraskan horizontal */
        width: 70px;
        height: 7px;
        background-color: #212529;
    }
    .line-custom-2 {
        position: relative;
        width: 100px;
        height: 3px;
        background-color: #212529;
        margin: 20px;
    }
    .rectangle-custom-2 {
        position: absolute;
        top: -2px; /* (7px - 3px) / 2 = 2px untuk menyelaraskan vertikal */
        left: 25px; /* (100px - 50px) / 2 = 35px untuk menyelaraskan horizontal */
        width: 50px;
        height: 7px;
        background-color: #212529;
    }
    .accordion-item{
        border:0!important;
    }
    .accordion-button:not(.collapsed){
        background-color: #D9E8FC;
        box-shadow: none;
        border-radius: 50px!important;
    }
    .line-border-radius-small{
        background-color: #6998AB;
        width:40px;
        height: 5px;
        border-radius:15%;
        margin-bottom:20px;
    }
    .owl-prev {
        width: 15px;
        height: 15px;
        position: absolute;
        top: 40%;
        margin-left: 0px;
        display: block !important;
        border:0px solid black;
    }

    .owl-next {
        width: 15px;
        height: 15px;
        position: absolute;
        top: 40%;
        right: 0px;
        display: block !important;
        border:0px solid black;
    }
    .owl-prev i, .owl-next i {
        color: white;
        background-color: #6998AB;
        padding:5px 10px;
        border-radius:50%;
    }
    @media only screen and (min-width: 600px) {
        .desktop-to-left {
            margin-left: -100px;
            display: block;
            z-index: 1001;
            position: relative;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }
        .owl-prev {
            width: 15px;
            height: 15px;
            position: absolute;
            top: 40%;
            margin-left: -20px;
            display: block !important;
            border:0px solid black;
        }

        .owl-next {
            width: 15px;
            height: 15px;
            position: absolute;
            top: 40%;
            right: -25px;
            display: block !important;
            border:0px solid black;
        }
        .owl-prev i, .owl-next i {
            color: white;
            background-color: #6998AB;
            padding:15px 20px;
            border-radius:50%;
        }
    }
    html,body{
        overflow-x: hidden;
    }

    .daftarinformasipublik-card-title{
        background: white;
        padding: 15px 25px;
        margin-top: -70px;
        z-index: 1;
        position: relative;
        border: 1px solid black;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .laporanpemerintah-card-title{
        background: white;
        padding: 15px 25px;
        margin-top: -70px;
        z-index: 1;
        position: relative;
        border: 1px solid black;
        border-radius: 10px;
        margin-bottom: 20px;
    }
</style>
