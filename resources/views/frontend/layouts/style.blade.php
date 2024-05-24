<style>
    /* .banner_area div {
        height: 100%;
        color: red;
    } */
.home_form_label{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px
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
</style>
