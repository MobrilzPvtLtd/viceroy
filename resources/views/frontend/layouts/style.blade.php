<style>
    /* .banner_area div {
        height: 100%;
        color: red;
    } */




    /* new css start here */
    .search-container {
    display: flex;
    align-items: flex-end;
    justify-content: center;
    padding: 10px;
    gap: 5px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.search-input {
    width: 200px;
    padding: 10px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.select-input {
    padding: 10px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.search-button {
    padding: 11px 20px;
    background-color: #1a3b42;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.search-button:hover {
    background-color: #11282c;
}

/* Dropdown Styling */
.dropdown {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-right: 10px;
    gap: 5px;

}
.dropdown1 {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-right: 10px;
    gap: 5px;

}

.dropbtn {
    padding: 10px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 4px;
    cursor: pointer;
    width: 150px;
}

.dropdown-content {
        display: flex !important;
        justify-content: center;
        align-items: center;
    opacity: 0;
    visibility: hidden;
    position: absolute;
    background-color: white;
    min-width: fit-content;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* padding: 10px; */
    z-index: 1;
    border-radius: 4px;
    width: 100%;
    transition: all .3s ease-in-out;
    transform: translateY(10rem);
}

.dropdown1:hover .dropdown-content {
    display: flex !important;
    justify-content: center;
    align-items: center;
    opacity: 1;
    visibility: visible;
    transform: translateY(6rem);
}

.dropdown-column {
    display: flex;
    flex-direction: column;
    margin:5px;
    justify-content: center;
    align-items: center;
}

.dropdown-column label {
    margin-bottom: 5px;
}

.dropdown-column select {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.select-container {
    max-width: 400px;
    min-width: 200px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 5px;
}

.select2-container--default .select2-search--inline .select2-search__field {
    padding: 4px 0 !important;
}

.select-input {
    width: 100%;
}

@media (max-width: 768px) {
    .select-container {
        max-width: 600px;
    }
    .search-container {
        flex-direction: column;
        padding: 15px;
    }

    .search-input, .select-input, .search-button {
        margin-bottom: 10px;
        width: 100%;
    }

    .search-button {
        margin-top: 5px;
        width: 100%;
    }

    .dropdown {
        width: 100%;
    }

    .dropbtn {
        width: 100%;
    }

    .dropdown-content {
        position: static;
        flex-direction: row;
    }
}

    /* new css ends here */
.home_form_label{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    gap: 10px;
}
.home_form_label label{
    font-weight: 600;
}
#close001{
    position: absolute !important;
}
#close002{
    position: absolute !important;
}
.select_label{
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: white;
    border: 1px solid #ccc;
    padding: 10px 18px;
    /* padding-right: 5px; */
    font-size: 16px;
    position: relative;
    width: 12vw;
}
.select_label::after {
    content: '\25BC';
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-10%);
    pointer-events: none;
    font-size: 12px;
    color: #555;
}
#close_btn_minmax{
    cursor: pointer;
}
.adv_search_area .adv_search_close{

    position: absolute;
    top: 5px;
    right: 5px;
    width: 30px;
    height: 30px;
    z-index: 99999;
    background: var(--colorOrange);
    line-height: 31px;
    text-align: center;
    color: var(--colorWhite);
    cursor: pointer;
    transition: all linear .3s;
    -webkit-transition: all linear .3s;
    -moz-transition: all linear .3s;
    -ms-transition: all linear .3s;
    -o-transition: all linear .3s;
    display: none;

}
.adv_search_area2.adv_search_close_02 {

    position: absolute;
    top: 5px;
    right: 5px;
    width: 30px;
    height: 30px;
    z-index: 99999;
    background: var(--colorOrange);
    line-height: 31px;
    text-align: center;
    color: var(--colorWhite);
    cursor: pointer;
    transition: all linear .3s;
    -webkit-transition: all linear .3s;
    -moz-transition: all linear .3s;
    -ms-transition: all linear .3s;
    -o-transition: all linear .3s;
    display: none;

}


#container2 {

    background-color: #ffffff80 !important;
    width: 80vw;
    height: fit-content !important;
    position: sticky;
    top: 0;
    transition: top 0.3s ease;
    z-index: 1;
    border-radius: 10px;

}
.col-xl-12.col-lg-12.buy001 {
    display: contents;
}
.property_grid_view .banner_search {
    margin-top: 0px;
}
/* .adv_search_area.show_search1 {
    transform: scale(1);
    position: absolute;
    top: 8vw !important;
    opacity: 1;
    left: 24vw;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);

}
.adv_search_area .show_search2 {
    transform: scale(1);
    position: absolute;
    top: 8vw !important;
    opacity: 1;
    left: 24vw;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);

}
.adv_search_area2.show_search2 {
    transform: scale(1);
    position: absolute;
    top: 8vw !important;
    opacity: 1;
    left: 34vw;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);

} */
#close001{
    /* visibility: hidden; */
    display: none;
    transform: scale(1);
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
}
#close002{
    /* visibility: hidden; */
    display: none;
    transform: scale(1);
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
}
#close003{
    /* visibility: hidden; */
    display: none;
    transform: scale(1);
    position: absolute;
    top: 8vw !important;
    opacity: 1;
    left: 24vw;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
}
#close004{
    /* visibility: hidden; */
    display: none;
    transform: scale(1);
    position: absolute;
    top: 8vw !important;
    width: 15vw !important;
    padding: 33px 0px;
    opacity: 1;
    left: 34vw;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
}
/* #close001:not(:hover){
    visibility: hidden;
    opacity: 0;
}
#close001:hover{
    visibility: hidden;

} */
select.select_2 {
    padding: 15px 35px;
}
#min_max {
    display: flex;
    margin: 0;
    height: fit-content;
    background-color: white;
    padding: 5px;
    width: fit-content;
    position: absolute;
    top: 0px;
    left: -100px;
    gap: 15px;
    justify-content: center;
    align-items: center;
    /* justify-content: space-evenly; */
    /* margin-left: 20px; */
}

.adv_search_area{
    width: fit-content;
}

.adv_search_close3 {
    display: none;
}

</style>
<style>
    /* *,
  *::before,
  *::after {
    box-sizing: border-box;
  }
  html,
  body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: #0072ac;
    display: flex;
  } */

  .sidecart {
    z-index: 99999999;
    width: 100%;
    max-width: 450px;
    height: 100vh;
    background: #fff;
    position: fixed;
    right: 0;
    top: 0;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
    transition-delay: 0.2s;
  }
  .sidecart__overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 99999998;
    background: rgba(0, 0, 0, 0.5);
    visibility: visible;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    transition: all 0.3s cubic-bezier(0.77, 0.26, 0, 0.98);
  }
  .sidecart__overlay--hide {
    opacity: 0;
    visibility: hidden;
  }
  .sidecart__title {
    height: 70px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-bottom: 1px solid #b0b0b0;
    background: #f6f6f6;
  }
  .sidecart__title-text {
    font-size: 34px;
    font-weight: 700;
  }
  .sidecart__close {
    position: absolute;
    left: 0;
    margin-left: 20px;
    font-size: 18px;
    color: grey;
    cursor: pointer;
  }
  .sidecart__items {
    width: 100%;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }
  .sidecart__items--empty {
    justify-content: center;
  }
  .sidecart__empty-text {
    font-size: 18px;
    font-weight: 500;
    align-self: center;
    visibility: visible;
    transition: all 0.3s ease;
  }
  .sidecart__empty-text--hide {
    opacity: 0;
    visibility: hidden;
  }
  .sidecart__footer {
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-top: 1px solid #b0b0b0;
    background: #f6f6f6;
  }
  .sidecart__checkout {
    width: 60%;
    height: 60px;
    border-radius: 10px;
    outline: none;
    box-shadow: none;
    color: white;
    background-color: #05c305;
    border: none;
    text-shadow: none;
    font-size: 30px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.1s ease-in-out;
  }
  .sidecart__checkout:hover {
    background: #04a804;
  }
  .sidecart--close {
    transform: translateX(460px);
    opacity: 0.2;
  }

  .content {
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .test-cart {
    width: 100px;
    height: 100px;
    background: #fff;
    padding: 20px;
    border-radius: 50%;
    font-size: 50px;
    margin-bottom: 40px;
    cursor: pointer;
    text-align: center;
    transition: all 0.2s ease-in-out;
  }
  .test-cart:hover {
    color: #fff;
    background: #000;
  }
  #min_max2 {
    display: flex;
    margin: 0;
    height: fit-content;
    background-color: white;
    padding: 5px;
    width: fit-content;
    position: absolute;
    top: 0px;
    left: -100px;
    gap: 15px;
    justify-content: center;
    align-items: center;
    /* justify-content: space-evenly; */
    /* margin-left: 20px; */
}
.adv_search_area2 {
    width: fit-content !important;
    background: var(--colorWhite);
    height: auto !important;
    position: absolute;
    /* top: 100%; */
    /* left: 310px; */
    padding: 30px;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    transform: scaleY(0);
    transform-origin: top;
    opacity: 0;
    -webkit-transform: scaleY(0);
    -moz-transform: scaleY(0);
    -ms-transform: scaleY(0);
    -o-transform: scaleY(0);
    transition: all linear 0.3s;
    -webkit-transition: all linear 0.3s;
    -moz-transition: all linear 0.3s;
    -ms-transition: all linear 0.3s;
    -o-transition: all linear 0.3s;
    z-index: 999999;
}
  /* .test {
    cursor: pointer;
    margin: 20px;
    padding: 10px 20px;
    border-radius: 20px;
    border: none;
    width: 400px;
    height: 400px;
    outline: none;
    background: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
  } */
  /* .test__product {
    background-image: url("https://www.imobie.com/phoneclean/img/an_imgs_iphone.png");
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    width: 300px;
    margin: 0 auto;
    height: 300px;
  } */
  /* .test__btn {
    width: 300px;
    height: 60px;
    border-radius: 10px;
    border: none;
    background-color: #00b92c;
    font-size: 24px;
    font-weight: 700;
    color: #fff;
    outline: none;
    cursor: pointer;
    transition: all 0.1s ease-in-out;
  }
  .test__btn:hover {
    background: #05c305;
  } */


  p.notify001 {
    color: #fff;
    background-color: #e6b025;
    width: 2vw;
    height: 4vh;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 20px;
    position: absolute;
    right: 40px;
    font-size: 17px;
    top: 15px;
}
button#addToCart {
    background-color: #e6b025;
    border-color: #e6b025;
    border-radius: 50px;
    height: 6vh;
    width: 3vw;
}

@media screen and (min-width:1025px) and (max-width:1300px) {
    .select_label {
        /* padding-right: 5px; */
        font-size: 10px;

    }
    select.select_2 {
    padding: 10px 20px;
}
.adv_search_area {
    width: fit-content;
}
.adv_search_area {

    padding: 30px;
}
.adv_search_area2 {

    padding: 30px;

}
select.select_2 {
    font-size: 10px;
}
.adv_search_area2 {
    width: fit-content;
}
.s22 {
        padding: 10px 15px;
    }
}
@media screen and (max-width: 768px) {
    #close001 {
        top: 50vw !important;
        left: 45vw !important;
    }
}
#close002 {
    /* top: 73vw !important; */
    left: 40vw;
}



button.gm-control-active {
    height: 19px !important;
    top: 19px !important;
}
#min_max2 select {
    padding: 15px 24px;
}
</style>
