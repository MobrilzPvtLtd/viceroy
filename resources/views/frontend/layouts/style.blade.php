<style>
    /* .banner_area div {
        height: 100%;
        color: red;
    } */
.home_form_label{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    gap: 10px
}
.home_form_label label{
    font-weight: 600;
}
.select_label{
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: white;
    border: 1px solid #ccc;
    padding: 10px 30px;
    padding-right: 30px;
    font-size: 16px;
    position: relative;
    width: 100%;
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

}
</style>
