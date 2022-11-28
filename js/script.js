
const scroll_top = document.getElementById('btnScrollTop');
const login = document.getElementById('login');
const form_login =document.querySelector(".form")
const form_Page =document.querySelector(".form-page")
const times =document.querySelector(".times")

const tab_links = document.querySelectorAll('.menu__img')
const menus = document.querySelectorAll('.menu')
openMenu = (e, id_menu_name)=>{
    
    const menu_name = document.getElementById(id_menu_name)
    tab_links.forEach(tab_link =>{
        tab_link.classList.remove('bg')
        tab_link.style.transform = "rotate(0)";
        tab_link.style.transition = "500ms";
    })
    menus.forEach(menu =>{
        menu.classList.remove('d-flex')
    })
    e.currentTarget.classList.add('bg')
    e.currentTarget.style.transform = "rotate(15deg)";

    menu_name.classList.add('d-flex')
}

// scroll top

scroll_top.addEventListener('click', ()=>{
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
    });
    
});


login.addEventListener('click',()=>{
    console.log('clicked')
    form_Page.style.display === 'block'? form_Page.style.display = 'none' : form_Page.style.display ='block'
    
})
times.addEventListener('click',()=>{  
    
    form_Page.style.display = 'none'     
})


//Danh mục thanh toán:
const s = document.querySelector('.hidden_text');
const icon__Tea = document.querySelector(".icon__tea");
const order__cart__title = document.querySelector('.order__cart-title') 
const span_hidden = document.querySelector('.span-hidden') 


openTab = (event, id_menu) => {
    const id_name = document.getElementById(id_menu)
    id_name.style.display === 'none' ? id_name.style.display = 'flex' : id_name.style.display = 'none'
        
    
}
$(document).ready(function(){
    $("#cart").click(function(){
      $(".shopping-cart").fadeToggle("fast");
    
    });
  });




