document.getElementById("main-action").onclick=function (){
    document.getElementById("collections").scrollIntoView({behavior:"smooth"});
}

var buttons=document.getElementsByClassName("col-button");
for(var i=0; i<buttons.length; i++) {
    buttons[i].onclick=function () {
        document.getElementById("price").scrollIntoView({behavior:"smooth"});
    }
}

document.getElementById("application-action").onclick=function (){
    if (document.getElementById("name").value==="") {
        alert("Заполните имя!");
    }
    else if (document.getElementById("phone").value==="") {
        alert("Заполните телефон!");
    }
    else if (document.getElementById("mail").value==="") {
        alert("Заполните адрес эл.почты!");
    }
    else alert("Спасибо за заявку! Мы свяжемся с Вами в ближйшее время!");
}

document.addEventListener("DOMContentLoaded", function () {
    let layer = document.querySelector('.application-image');
    document.addEventListener('mousemove', (event) => {
        layer.style.transform = 'translate3d(' + ((event.clientX * 0.3) / 6) + 'px,' + ((event.clientY * 0.3) / 8) + 'px,0px)';
    });

    /*const elem = document.querySelector(".main");
    document.addEventListener('scroll', () => {
        elem.style.backgroundPositionX = '0' + (0.2 * window.pageYOffset) + 'px';
    })*/
});

document.getElementById("about-action").onclick=function (){
    document.getElementById("advantages").scrollIntoView({behavior:"smooth"});
}

document.getElementById("adv-action").onclick=function (){
    document.getElementById("application").scrollIntoView({behavior:"smooth"});
}

document.getElementById("order-action").onclick=function (){
    if (document.getElementById("name").value==="") {
        alert("Заполните имя!");
    }
    else if (document.getElementById("phone").value==="") {
        alert("Заполните телефон!");
    }
    else if (document.getElementById("mail").value==="") {
        alert("Заполните адрес эл.почты!");
    }
    else if (document.getElementById("ITN").value==="") {
        alert("Заполните ИНН!");
    }
    else if (document.getElementById("country").value==="") {
        alert("Заполните страну!");
    }
    else if (document.getElementById("city").value==="") {
        alert("Заполните город!");
    }
    else alert("Спасибо за заявку! Мы свяжемся с Вами в ближйшее время!");
}