/* ====== zmiana img  ====== */

strap_ch()
function strap_ch(){
let img = document.querySelector('#strap_basic');
let btn1 = document.querySelector('#strap_btn1');
let btn2 = document.querySelector('#strap_btn2');
let btn3 = document.querySelector('#strap_btn3');
let btn4 = document.querySelector('#strap_btn4');
let btn5 = document.querySelector('#strap_btn5');
let btn6 = document.querySelector('#strap_btn6');
btn1.addEventListener('click', () => {
    img.src = 'watchimg/lg/strap/1.png';
})
btn2.addEventListener('click', () => {
    img.src = 'watchimg/lg/strap/2.png';
})
btn3.addEventListener('click', () => {
    img.src = 'watchimg/lg/strap/3.png';
})
btn4.addEventListener('click', () => {
    img.src = 'watchimg/lg/strap/4.png';
})
btn5.addEventListener('click', () => {
    img.src = 'watchimg/lg/strap/5.png';
})
btn6.addEventListener('click', () => {
    img.src = 'watchimg/lg/strap/6.png';
})

}

case_ch();
function case_ch() {
    let img = document.querySelector('#case_basic');
    let btn1 = document.querySelector('#case_btn1');
    let btn2 = document.querySelector('#case_btn2');
    let btn3 = document.querySelector('#case_btn3');
;
    btn1.addEventListener('click', () => {
        img.src = 'watchimg/lg/case/1.png';
    })
    btn2.addEventListener('click', () => {
        img.src = 'watchimg/lg/case/2.png';
    })
    btn3.addEventListener('click', () => {
        img.src = 'watchimg/lg/case/3.png';
    })

}



/* ====== filtr koloru na img ====== */

function strap_color_gold()
{
    document.getElementById("strap_basic").setAttribute("class", "strap_color_gold");
}


function strap_color_black()
{
    document.getElementById('strap_basic').setAttribute("class", "strap_color_black");
}

function strap_color_basic()
{
    document.getElementById('strap_basic').setAttribute("class", "strap_color_basic");
}



function case_color_gold()
{
    document.getElementById('case_basic').setAttribute("class", "case_color_gold");
}

function case_color_black()
{
    document.getElementById('case_basic').setAttribute("class", "case_color_black");
}

function case_color_basic()
{
    document.getElementById('case_basic').setAttribute("class", "case_color_basic")
}

/* ====== palety kolorów wskazówek ====== */

function pallete_one()
{
    document.getElementsByClassName('index_one')[0].setAttribute("id", "pallete_gold");
    document.getElementsByClassName('index_two')[0].setAttribute("id", "pallete_gold");
    document.getElementsByClassName('index_three')[0].setAttribute("id", "pallete_gold");
    document.getElementsByClassName('index_four')[0].setAttribute("id", "pallete_gold");
    document.getElementsByClassName('hour_hand')[0].setAttribute("id", "pallete_gold");
    document.getElementsByClassName('sec_hand')[0].setAttribute("id", "pallete_gold");
    document.getElementsByClassName('min_hand')[0].setAttribute("id", "pallete_gold");
}
function pallete_two()
{
    document.getElementsByClassName('index_one')[0].setAttribute("id", "pallete_red");
    document.getElementsByClassName('index_two')[0].setAttribute("id", "pallete_red");
    document.getElementsByClassName('index_three')[0].setAttribute("id", "pallete_red");
    document.getElementsByClassName('index_four')[0].setAttribute("id", "pallete_red");
    document.getElementsByClassName('hour_hand')[0].setAttribute("id", "pallete_brown");
    document.getElementsByClassName('sec_hand')[0].setAttribute("id", "pallete_red");
    document.getElementsByClassName('min_hand')[0].setAttribute("id", "pallete_brown");
}
function pallete_three()
{
    document.getElementsByClassName('index_one')[0].setAttribute("id", "pallete_blue");
    document.getElementsByClassName('index_two')[0].setAttribute("id", "pallete_blue");
    document.getElementsByClassName('index_three')[0].setAttribute("id", "pallete_blue");
    document.getElementsByClassName('index_four')[0].setAttribute("id", "pallete_blue");
    document.getElementsByClassName('hour_hand')[0].setAttribute("id", "pallete_bluemedium");
    document.getElementsByClassName('sec_hand')[0].setAttribute("id", "pallete_blue");
    document.getElementsByClassName('min_hand')[0].setAttribute("id", "pallete_bluemedium");
}

function pallete_four()
{
    document.getElementsByClassName('outside_watch')[0].setAttribute("id", "pallete_bg_black");
    document.getElementsByClassName('inside_watch')[0].setAttribute("id", "pallete_bg_blacke");
}

function pallete_five()
{
    document.getElementsByClassName('outside_watch')[0].setAttribute("id", "pallete_bg_white");
    document.getElementsByClassName('inside_watch')[0].setAttribute("id", "pallete_bg_white");
}


/* ====== zmiana koloru logo ====== */

    logo_color_change();
    function logo_color_change() {
        let img = document.querySelector('#logo_watch_id');
        let btn1 = document.querySelector('#btn_black_pallete');
        let btn2 = document.querySelector('#btn_white_pallete');
       
        btn1.addEventListener('click', () => {
            img.src = 'watchimg/logo/x50white.png';
        })
        btn2.addEventListener('click', () => {
            img.src = 'watchimg/logo/x50black.png';
        })

    }
