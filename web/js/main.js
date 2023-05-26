 // ------------------------------ Отчет по пользователям -----------------------------------------
 const baskets = document.querySelectorAll('.basket');

 if (baskets) {
     baskets.forEach(function(basket) {
         basket.addEventListener('click', () => {
             let id_product = basket.getAttribute('data-id');
             let action = basket.getAttribute('data-action');

             jQuery.ajax({
                 type: "GET",
                 url: "/products/basket",
                 data: 'id=' + id_product,
                 success: function(data) {
                     let d = JSON.parse(data);

                     if (d.status === false) {
                         alert("Что то пошло не так....");
                         return false;
                     }
                     if (d.status === true) {
                         if (d.method === 'delete') {
                             if(action === 'basket'){
                                basket.parentNode.parentNode.remove();
                             }else{
                                basket.innerHTML = 'Корзина';
                                basket.classList.remove('btn-success');
                                basket.classList.add('btn-warning');
                             }
                         } else {
                             basket.innerHTML = 'В корзине';
                             basket.classList.remove('btn-warning');
                             basket.classList.add('btn-success');
                         }

                     }

                     // let r = JSON.parse(data);
                     // setTimeout(() => (this).remove(), 3000);
                     // $(content_block).html(datas;
                     // $('.progress').hide();

                     // if (remark_report) remark_report.classList.remove('op03');
                 },
             });
         });
     })
 }