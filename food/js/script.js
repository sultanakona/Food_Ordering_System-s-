navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   profile.classList.remove('active');
}

function loader(){
   document.querySelector('.loader').style.display = 'none';
}

function fadeOut(){
   setInterval(loader, 2000);
}

window.onload = fadeOut;

document.querySelectorAll('input[type="number"]').forEach(numberInput => {
   numberInput.oninput = () =>{
      if(numberInput.value.length > numberInput.maxLength) numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
   };
});


document.addEventListener('DOMContentLoaded', () => {
   const inputBox = document.getElementById('search-input');

   if (inputBox) {
       inputBox.addEventListener('input', (e) => {
           const searchValue = e.target.value.trim();
           if(searchValue !=""){
              document.querySelector('.search-item-box').classList.add('show-box');
            if (searchValue.length > 0) {
               fetch(`actions.php?searchString=${encodeURIComponent(searchValue)}`)
                   .then(response => {
                     return response.json();
                   })
                   .then(data => {
                     if(data.length!=0){
                        const html = data.map((item)=>{
                           return ` <a href="product.php?category=${item.name}" class="item-box">
                               <div class="item-img">
                                   <img src="uploaded_img/${item.image}" alt="${item.name}">
                               </div>
                               <h3>${item.name}</h3>
                           </a>`
                        }).join(" "); 
     
                 document.querySelector('.search-item-box').innerHTML = html;
                     }else{
                        const html= `<h3 style='color:white'>No Item Found</h3>`;
                        document.querySelector('.search-item-box').innerHTML = html;
                     }
                   })
                   .catch(error => {
                       console.error('There was a problem with the fetch operation:', error);
                   });
           } else {
               resultsContainer.innerHTML = ''; 
           }
           }else{
            document.querySelector('.search-item-box').classList.remove('show-box');
           }
       });
   } else {
       console.error("Element with id 'search-input' not found.");
   }
});

// Store the original price to restore it when input is empty
// const prevPriceElement = document.querySelector('.total_amount');
// const priceBox = document.querySelector('#price');
// const promoId = document.querySelector('.promo_id');
// const originalPrice = parseFloat(prevPriceElement.value);

// document.querySelector('.coupon_name').addEventListener('input', (e) => {
//     const searchValue = e.target.value.trim();
//     const prevPrice = parseFloat(prevPriceElement.value);

//     if (searchValue !== "" || prevPrice >= 1000) {
//       console.log(prevPrice, priceBox)
//         fetch(`actions.php?promoCodeName=${encodeURIComponent(searchValue)}`)
//             .then(response => response.text())
//             .then(data => {
//                 if (data.length !== 0) {
//                      var jsonData = JSON.parse(data);
//                     const promo_id = jsonData[0]['id'];
//                     const amount = jsonData[0]['amount'];

//                     const discount = originalPrice * (amount / 100);
//                     const newPrice = originalPrice - discount;

//                     prevPriceElement.value = newPrice.toFixed(2); 
//                     prevPriceElement.textContent = `${newPrice.toFixed(2)}`; 
//                     priceBox.value=newPrice.toFixed(2);
//                     priceBox.textContent = `${newPrice.toFixed(2)}`; 
//                     promoId.value=promo_id;

                   
//                 }else{
//                   prevPriceElement.value = originalPrice.toFixed(2); 
//                 prevPriceElement.textContent = `${originalPrice.toFixed(2)}`;
//                 priceBox.value=originalPrice.toFixed(2);
//                 priceBox.textContent = `${originalPrice.toFixed(2)}`; 
//                 promoId.value=0;
//                 }
//             });
//     } else {
//         prevPriceElement.value = originalPrice.toFixed(2); 
//         prevPriceElement.textContent = `${originalPrice.toFixed(2)}`;
//         priceBox.value=originalPrice.toFixed(2);
//          priceBox.textContent = `${originalPrice.toFixed(2)}`; 
//         promoId.value=0;
//     }
// });


document.querySelectorAll('i.fas.fa-star').forEach(function(element, index, nodeList) {
   element.addEventListener('click', function() {
       const ratingNumber=index+1;
       document.querySelector("#ratingNumber").value=ratingNumber;
       nodeList.forEach(function(icon, i) {
           if (i <= index) {
               icon.style.color = 'green';
           } else {
               icon.style.color = ''; 
           }
       });
   });
});

